<?php

namespace spkm\ClearPass\Tests\Helpers;

use Saloon\Http\Auth\AccessTokenAuthenticator;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\OAuth2\GetClientCredentialsTokenRequest;
use Saloon\Http\PendingRequest;
use Saloon\Http\Request;
use Saloon\Http\Response;
use spkm\ClearPass\ClearPassConnector;

class FakeClearPass
{
    public const BASE_URL = 'https://clearpass.example.test';

    public const API_URL = 'https://clearpass.example.test/api';

    /**
     * Fake ClearPass: each request class answers with the given response.
     *
     * @param  array<class-string<Request>|string, MockResponse|callable(PendingRequest): MockResponse>  $responses
     */
    public static function respondWith(array $responses = []): MockClient
    {
        MockClient::destroyGlobal();

        return MockClient::global($responses);
    }

    /**
     * A connector that already holds a token, so a test that isn't about tokens needs no token response.
     */
    public static function connector(string $clientId = 'client', string $clientSecret = 'secret', string $baseUrl = self::BASE_URL, bool $authenticated = true): ClearPassConnector
    {
        $connector = new ClearPassConnector($clientId, $clientSecret, $baseUrl);

        if ($authenticated) {
            $connector->authenticate(new AccessTokenAuthenticator('fake-token'));
        }

        return $connector;
    }

    /**
     * ClearPass's answer to the token request.
     */
    public static function token(string $accessToken = 'issued-token', int $expiresIn = 3600): MockResponse
    {
        return MockResponse::make(['access_token' => $accessToken, 'token_type' => 'Bearer', 'expires_in' => $expiresIn, 'scope' => null]);
    }

    /**
     * @param  array<class-string<Request>|string, MockResponse|callable(PendingRequest): MockResponse>  $responses
     */
    public static function respondWithToken(array $responses = [], ?MockResponse $token = null): MockClient
    {
        return self::respondWith([GetClientCredentialsTokenRequest::class => $token ?? self::token(), ...$responses]);
    }

    /**
     * A page of records as ClearPass sends it: {"_embedded": {"items": [...]}, "_links": {...}, "count": n}.
     *
     * @param  list<array<string, mixed>>  $items
     * @param  array<string, string>  $links
     */
    public static function list(array $items, ?int $count = null, array $links = [], int $status = 200): MockResponse
    {
        $body = ['_embedded' => ['items' => $items], '_links' => ['self' => ['href' => self::API_URL.'/x'], 'first' => ['href' => self::API_URL.'/x'], ...$links]];

        if ($count !== null) {
            $body['count'] = $count;
        }

        return MockResponse::make($body, $status);
    }

    /**
     * A link ClearPass puts in a list's _links, such as next => ['href' => ...].
     *
     * @return array<string, array<string, string>>
     */
    public static function link(string $name, string $href = self::API_URL.'/x?offset=100'): array
    {
        return [$name => ['href' => $href]];
    }

    /**
     * ClearPass's error body: API Problem JSON.
     *
     * @param  array<string, array<string, string>|string>  $validationMessages
     */
    public static function problem(int $status, string $title, ?string $detail = null, array $validationMessages = []): MockResponse
    {
        $body = ['type' => 'http://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html', 'title' => $title, 'status' => $status];

        if ($detail !== null) {
            $body['detail'] = $detail;
        }

        if ($validationMessages !== []) {
            $body['validation_messages'] = $validationMessages;
        }

        return MockResponse::make($body, $status, ['Content-Type' => 'application/problem+json']);
    }

    /**
     * Send one request through a connector to a faked ClearPass that answers it with the given body.
     *
     * @param  array<mixed>|string  $body
     * @param  array<string, string>  $headers
     */
    public static function send(Request $request, array|string $body = [], int $status = 200, array $headers = []): Response
    {
        self::respondWith([$request::class => MockResponse::make($body, $status, $headers)]);

        return self::connector()->send($request);
    }

    /**
     * The request ClearPass received for the given request class, as Saloon built it.
     *
     * @param  class-string<Request>  $requestClass
     */
    public static function received(MockClient $mockClient, string $requestClass): PendingRequest
    {
        return $mockClient->findResponseByRequest($requestClass)->getPendingRequest();
    }

    /**
     * The query strings ClearPass received for every request of the given class, in the order they were sent.
     *
     * @param  class-string<Request>  $requestClass
     * @return list<array<string, mixed>>
     */
    public static function queriesReceived(MockClient $mockClient, string $requestClass): array
    {
        return collect($mockClient->getRecordedResponses())
            ->filter(fn (Response $response) => $response->getRequest() instanceof $requestClass)
            ->map(fn (Response $response) => $response->getPendingRequest()->query()->all())
            ->values()
            ->all();
    }

    /**
     * The URIs ClearPass received for every request of the given class, as sent on the wire.
     *
     * @param  class-string<Request>  $requestClass
     * @return list<string>
     */
    public static function urisReceived(MockClient $mockClient, string $requestClass): array
    {
        return collect($mockClient->getRecordedResponses())
            ->filter(fn (Response $response) => $response->getRequest() instanceof $requestClass)
            ->map(fn (Response $response) => (string) $response->getPsrRequest()->getUri())
            ->values()
            ->all();
    }

    /**
     * The JSON bodies ClearPass received for every request of the given class.
     *
     * @param  class-string<Request>  $requestClass
     * @return list<mixed>
     */
    public static function bodiesReceived(MockClient $mockClient, string $requestClass): array
    {
        return collect($mockClient->getRecordedResponses())
            ->filter(fn (Response $response) => $response->getRequest() instanceof $requestClass)
            ->map(fn (Response $response) => json_decode((string) $response->getPsrRequest()->getBody(), true))
            ->values()
            ->all();
    }
}
