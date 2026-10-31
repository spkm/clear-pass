<?php

namespace spkm\ClearPass\Requests\Integrations\EndpointContextServer;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an endpoint context server: DELETE /endpoint-context-server/{endpoint_context_server_id}.
 */
class DeleteEndpointContextServerRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int|string $endpointContextServerId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/endpoint-context-server/'.rawurlencode((string) $this->endpointContextServerId);
    }
}
