<?php

namespace spkm\ClearPass;

use DateTimeImmutable;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use JsonException;
use JsonSerializable;
use Saloon\Config;
use Saloon\Contracts\OAuthAuthenticator;
use Saloon\Enums\Method;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Helpers\OAuth2\OAuthConfig;
use Saloon\Http\Auth\AccessTokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\OAuth2\GetClientCredentialsTokenRequest;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\HasPagination;
use Saloon\Traits\OAuth2\ClientCredentialsGrant;
use Saloon\Traits\Plugins\HasTimeout;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Requests\AdhocBodyRequest;
use spkm\ClearPass\Requests\AdhocRequest;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Resources\AdhocResource;
use spkm\ClearPass\Resources\HasResources;

/**
 * The connection to one ClearPass server: its API client's token (fetched with the client credentials grant before
 * the first request and cached, encrypted, until it is about to expire), timeouts and retries, with a resource for
 * every API ClearPass documents and ad-hoc calls for anything else.
 */
class ClearPassConnector extends Connector implements HasPagination
{
    use ClientCredentialsGrant;
    use HasResources;
    use HasTimeout;

    protected float $connectTimeout;

    protected float $requestTimeout;

    public function __construct(protected string $clientId, protected string $clientSecret, protected string $baseUrl)
    {
        $this->oauthConfig()->setClientId($clientId);
        $this->oauthConfig()->setClientSecret($clientSecret);

        $this->connectTimeout = (float) config('clearpass.timeouts.connect', Config::$defaultConnectionTimeout);
        $this->requestTimeout = (float) config('clearpass.timeouts.request', Config::$defaultRequestTimeout);

        if (config('clearpass.retries.times')) {
            $this->tries = (int) config('clearpass.retries.times');
            $this->retryInterval = (int) config('clearpass.retries.interval_ms', 500);
            $this->useExponentialBackoff = true;
            $this->throwOnMaxTries = false;
        }
    }

    /**
     * The API's root: the server's address with /api appended.
     */
    public function resolveBaseUrl(): string
    {
        return rtrim($this->baseUrl, '/').'/api';
    }

    /**
     * The server's address as configured, without /api.
     */
    public function baseUrl(): string
    {
        return $this->baseUrl;
    }

    protected function defaultOauthConfig(): OAuthConfig
    {
        return OAuthConfig::make()
            ->setTokenEndpoint('/oauth')
            ->setRequestModifier(function (Request $request) {
                $request->query()->add('grant_type', 'client_credentials');
            });
    }

    /**
     * @return array<string, string>
     */
    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
        ];
    }

    public function send(Request $request, ?MockClient $mockClient = null, ?callable $handleRetry = null): Response
    {
        $this->ensureAuthenticated($request);

        $response = parent::send($request, $mockClient, $handleRetry);

        if ($response->status() === 401 && config('clearpass.reauthenticate', true) && ! $request instanceof GetClientCredentialsTokenRequest) {
            Cache::forget($this->tokenCacheKey());
            $this->authenticate($this->cacheAccessToken());

            return parent::send($request, $mockClient, $handleRetry);
        }

        return $response;
    }

    public function sendAsync(Request $request, ?MockClient $mockClient = null): PromiseInterface
    {
        $this->ensureAuthenticated($request);

        return parent::sendAsync($request, $mockClient);
    }

    /**
     * Fetches a token (from the cache, or from ClearPass) before the connector's first request, and a new one once the
     * token it holds is a minute from expiring, as a connector in a long-running worker needs. Building a connector
     * never contacts ClearPass.
     */
    private function ensureAuthenticated(Request $request): void
    {
        if ($request instanceof GetClientCredentialsTokenRequest) {
            return;
        }

        if ($this->getAuthenticator() === null || $this->tokenExpiresWithinAMinute()) {
            $this->authenticate($this->getCachedAccessToken());
        }
    }

    /**
     * Retry only a request that changes nothing, and only for a fault on ClearPass's side or the way there.
     */
    public function handleRetry(FatalRequestException|RequestException $exception, Request $request): bool
    {
        $isSafe = $request instanceof ClearPassRequest ? $request->isSafe() : $request->getMethod() === Method::GET;

        if (! $isSafe) {
            return false;
        }

        return $exception instanceof FatalRequestException
            || in_array($exception->getResponse()->status(), [408, 429], true)
            || $exception->getResponse()->serverError();
    }

    /**
     * The token for this server and client, from the cache when one is there with time left, else from ClearPass.
     */
    public function getCachedAccessToken(): OAuthAuthenticator
    {
        $cached = Cache::get($this->tokenCacheKey());

        if (is_string($cached)) {
            try {
                $token = json_decode(Crypt::decryptString($cached), true, flags: JSON_THROW_ON_ERROR);
            } catch (DecryptException|JsonException) {
                $token = null;
            }

            if (is_string($token['access_token'] ?? null) && is_int($token['expires_at'] ?? null)) {
                return new AccessTokenAuthenticator($token['access_token'], null, new DateTimeImmutable('@'.$token['expires_at']));
            }
        }

        return $this->cacheAccessToken();
    }

    /**
     * Whether the token the connector holds is a minute or less from expiring.
     */
    private function tokenExpiresWithinAMinute(): bool
    {
        $authenticator = $this->getAuthenticator();
        $expiresAt = $authenticator instanceof AccessTokenAuthenticator ? $authenticator->getExpiresAt() : null;

        return $expiresAt !== null && $expiresAt->getTimestamp() - 60 <= Carbon::now()->getTimestamp();
    }

    /**
     * The token's cache key: one per server and client, hashed so neither appears in the cache.
     */
    private function tokenCacheKey(): string
    {
        return 'clearpass.token.'.sha1($this->resolveBaseUrl().'|'.$this->clientId);
    }

    private function cacheAccessToken(): AccessTokenAuthenticator
    {
        try {
            /** @var AccessTokenAuthenticator $authenticator */
            $authenticator = $this->getAccessToken();
        } catch (RequestException $exception) {
            throw ClearPassApiException::fromResponse($exception->getResponse());
        }

        $expiresAt = $authenticator->getExpiresAt();

        if ($expiresAt === null) {
            return $authenticator;
        }

        Cache::put(
            $this->tokenCacheKey(),
            Crypt::encryptString(json_encode([
                'access_token' => $authenticator->getAccessToken(),
                'expires_at' => $expiresAt->getTimestamp(),
            ], JSON_THROW_ON_ERROR)),
            Carbon::instance($expiresAt)->subMinute(),
        );

        return $authenticator;
    }

    /**
     * Page through a list request, $perPage records at a time (clearpass.pagination.per_page by default).
     */
    public function paginate(Request $request, ?int $perPage = null): ClearPassPaginator
    {
        return new ClearPassPaginator($this, $request, $perPage ?? (int) config('clearpass.pagination.per_page', 100));
    }

    /**
     * A query over an endpoint the package has no resource for, as ClearPass::from('/new-thing'); its records are
     * arrays.
     *
     * @return Builder<Data>
     */
    public function from(string $path): Builder
    {
        return new AdhocResource($this, $path);
    }

    /**
     * @param  array<string, mixed>  $query
     */
    public function get(string $path, array $query = []): Response
    {
        return $this->send(new AdhocRequest(Method::GET, $path, $query));
    }

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $query
     */
    public function post(string $path, array|JsonSerializable $body = [], array $query = []): Response
    {
        return $this->send(new AdhocBodyRequest(Method::POST, $path, $body, $query));
    }

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $query
     */
    public function put(string $path, array|JsonSerializable $body = [], array $query = []): Response
    {
        return $this->send(new AdhocBodyRequest(Method::PUT, $path, $body, $query));
    }

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $query
     */
    public function patch(string $path, array|JsonSerializable $body = [], array $query = []): Response
    {
        return $this->send(new AdhocBodyRequest(Method::PATCH, $path, $body, $query));
    }

    /**
     * @param  array<string, mixed>  $query
     */
    public function delete(string $path, array $query = []): Response
    {
        return $this->send(new AdhocRequest(Method::DELETE, $path, $query));
    }
}
