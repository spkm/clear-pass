<?php

namespace spkm\ClearPass\Requests\Integrations\EndpointContextServer;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Integrations\EndpointContextServer;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of an endpoint context server by server name: PATCH /endpoint-context-server/server-name/{server_name}.
 */
class UpdateEndpointContextServerByServerNameRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = EndpointContextServer::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serverName, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/endpoint-context-server/server-name/'.rawurlencode((string) $this->serverName);
    }
}
