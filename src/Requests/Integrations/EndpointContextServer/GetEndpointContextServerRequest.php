<?php

namespace spkm\ClearPass\Requests\Integrations\EndpointContextServer;

use spkm\ClearPass\Data\Integrations\EndpointContextServer;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an endpoint context server: GET /endpoint-context-server/{endpoint_context_server_id}.
 */
class GetEndpointContextServerRequest extends ItemRequest
{
    protected ?string $dto = EndpointContextServer::class;

    public function __construct(protected int|string $endpointContextServerId) {}

    public function resolveEndpoint(): string
    {
        return '/endpoint-context-server/'.rawurlencode((string) $this->endpointContextServerId);
    }
}
