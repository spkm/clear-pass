<?php

namespace spkm\ClearPass\Requests\Integrations\EndpointContextServer;

use spkm\ClearPass\Data\Integrations\EndpointContextServer;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an endpoint context server by server name: GET /endpoint-context-server/server-name/{server_name}.
 */
class GetEndpointContextServerByServerNameRequest extends ItemRequest
{
    protected ?string $dto = EndpointContextServer::class;

    public function __construct(protected string $serverName) {}

    public function resolveEndpoint(): string
    {
        return '/endpoint-context-server/server-name/'.rawurlencode((string) $this->serverName);
    }
}
