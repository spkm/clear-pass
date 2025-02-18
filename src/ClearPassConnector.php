<?php

namespace spkm\ClearPass;

use Saloon\Helpers\OAuth2\OAuthConfig;
use Saloon\Http\Connector;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\HasPagination;
use Saloon\PaginationPlugin\OffsetPaginator;
use Saloon\Traits\OAuth2\ClientCredentialsGrant;

class ClearPassConnector extends Connector implements HasPagination
{
    use ClientCredentialsGrant;

    protected string $baseUrl;

    public function __construct(string $clientId, string $clientSecret, string $baseUrl)
    {
        $this->oauthConfig()->setClientId($clientId);
        $this->oauthConfig()->setClientSecret($clientSecret);
        $this->baseUrl = $baseUrl;

        // TODO securely cache the access token
        $authenticator = $this->getAccessToken();
        $this->authenticate($authenticator);
    }

    protected function defaultOauthConfig(): OAuthConfig
    {
        return OAuthConfig::make()
            ->setTokenEndpoint('/oauth')
            ->setRequestModifier(function (Request $request) {
                $request->query()->add('grant_type', 'client_credentials');
            });
    }

    public function resolveBaseUrl(): string
    {
        return $this->baseUrl.'/api';
    }

    protected function defaultHeaders(): array
    {
        return [
            'cache-control' => 'no-cache',
            'Accept' => 'application/json',
        ];
    }

    public function paginate(Request $request): OffsetPaginator
    {
        return new class(connector: $this, request: $request) extends OffsetPaginator
        {
            protected ?int $perPageLimit = 100;

            protected function isLastPage(Response $response): bool
            {
                return $this->getOffset() >= (int) $response->json('count');
            }

            protected function getPageItems(Response $response, Request $request): array
            {
                return $response->json('_embedded')['items'];
            }
        };
    }
}
