<?php

namespace spkm\ClearPass\Requests\Integrations\EndpointContextServer;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an endpoint context server by server name: DELETE /endpoint-context-server/server-name/{server_name}.
 */
class DeleteEndpointContextServerByServerNameRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serverName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/endpoint-context-server/server-name/'.rawurlencode((string) $this->serverName);
    }
}
