<?php

namespace spkm\ClearPass\Resources\Integrations;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\Integrations\EndpointContextServer;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\Integrations\EndpointContextServer\CreateEndpointContextServerRequest;
use spkm\ClearPass\Requests\Integrations\EndpointContextServer\DeleteEndpointContextServerByServerNameRequest;
use spkm\ClearPass\Requests\Integrations\EndpointContextServer\DeleteEndpointContextServerRequest;
use spkm\ClearPass\Requests\Integrations\EndpointContextServer\GetEndpointContextServerByServerNameRequest;
use spkm\ClearPass\Requests\Integrations\EndpointContextServer\GetEndpointContextServerRequest;
use spkm\ClearPass\Requests\Integrations\EndpointContextServer\GetEndpointContextServersRequest;
use spkm\ClearPass\Requests\Integrations\EndpointContextServer\ReplaceEndpointContextServerByServerNameRequest;
use spkm\ClearPass\Requests\Integrations\EndpointContextServer\ReplaceEndpointContextServerRequest;
use spkm\ClearPass\Requests\Integrations\EndpointContextServer\TriggerPollEndpointContextServerByServerNameRequest;
use spkm\ClearPass\Requests\Integrations\EndpointContextServer\TriggerPollEndpointContextServerRequest;
use spkm\ClearPass\Requests\Integrations\EndpointContextServer\UpdateEndpointContextServerByServerNameRequest;
use spkm\ClearPass\Requests\Integrations\EndpointContextServer\UpdateEndpointContextServerRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage Endpoint Context servers, from ClearPass::integrations()->endpointContextServers().
 *
 * @extends Builder<EndpointContextServer>
 */
class EndpointContextServerResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, EndpointContextServer::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetEndpointContextServersRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateEndpointContextServerRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetEndpointContextServerRequest($id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateEndpointContextServerRequest($id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceEndpointContextServerRequest($id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteEndpointContextServerRequest($id, $options);
    }

    /**
     * Get an endpoint context server by server name: GET /endpoint-context-server/server-name/{server_name}.
     */
    public function findByServerName(string $serverName): ?EndpointContextServer
    {
        return $this->fetchOrNull(new GetEndpointContextServerByServerNameRequest($serverName));
    }

    /**
     * Update some fields of an endpoint context server by server name: PATCH /endpoint-context-server/server-name/{server_name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByServerName(string $serverName, array|Data $attributes = [], array $options = []): ?EndpointContextServer
    {
        return $this->fetch(new UpdateEndpointContextServerByServerNameRequest($serverName, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace an endpoint context server by server name: PUT /endpoint-context-server/server-name/{server_name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByServerName(string $serverName, array|Data $attributes = [], array $options = []): ?EndpointContextServer
    {
        return $this->fetch(new ReplaceEndpointContextServerByServerNameRequest($serverName, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete an endpoint context server by server name: DELETE /endpoint-context-server/server-name/{server_name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByServerName(string $serverName, array $options = []): bool
    {
        $this->fetch(new DeleteEndpointContextServerByServerNameRequest($serverName, $options));

        return true;
    }

    /**
     * Trigger polling for an endpoint context server: PATCH /endpoint-context-server/{endpoint_context_server_id}/trigger-poll.
     *
     * @param  array<string, mixed>  $options
     */
    public function triggerPoll(int|string $endpointContextServerId, array $options = []): ?EndpointContextServer
    {
        return $this->fetch(new TriggerPollEndpointContextServerRequest($endpointContextServerId, $options));
    }

    /**
     * Trigger polling for an endpoint context server by server name: PATCH /endpoint-context-server/server-name/{server_name}/trigger-poll.
     *
     * @param  array<string, mixed>  $options
     */
    public function triggerPollByServerName(string $serverName, array $options = []): ?EndpointContextServer
    {
        return $this->fetch(new TriggerPollEndpointContextServerByServerNameRequest($serverName, $options));
    }
}
