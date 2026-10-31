<?php

namespace spkm\ClearPass\Requests\Integrations\EndpointContextServer;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Integrations\EndpointContextServer;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of an endpoint context server: PATCH /endpoint-context-server/{endpoint_context_server_id}.
 */
class UpdateEndpointContextServerRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = EndpointContextServer::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int|string $endpointContextServerId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/endpoint-context-server/'.rawurlencode((string) $this->endpointContextServerId);
    }
}
