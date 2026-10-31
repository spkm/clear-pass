<?php

namespace spkm\ClearPass\Resources\LocalServerConfiguration;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\LocalServerConfiguration\SystemServiceControl;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;
use spkm\ClearPass\Requests\LocalServerConfiguration\SystemServiceControl\GetSystemServiceByServiceNameRequest;
use spkm\ClearPass\Requests\LocalServerConfiguration\SystemServiceControl\GetSystemServiceControlsRequest;
use spkm\ClearPass\Requests\LocalServerConfiguration\SystemServiceControl\StartSystemServiceByServiceNameRequest;
use spkm\ClearPass\Requests\LocalServerConfiguration\SystemServiceControl\StopSystemServiceByServiceNameRequest;

/**
 * Control services running on a server, from ClearPass::localServerConfiguration()->systemServiceControls().
 *
 * @extends Builder<SystemServiceControl>
 */
class SystemServiceControlResource extends Builder
{
    public function __construct(ClearPassConnector $connector, protected string $serverUuid)
    {
        parent::__construct($connector, SystemServiceControl::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSystemServiceControlsRequest($this->serverUuid, $query);
    }

    /**
     * Get a service by name: GET /server/service/{server_uuid}/{service_name}.
     */
    public function findByServiceName(string $serviceName): ?SystemServiceControl
    {
        return $this->fetchOrNull(new GetSystemServiceByServiceNameRequest($this->serverUuid, $serviceName));
    }

    /**
     * Start a service by name: PATCH /server/service/{server_uuid}/{service_name}/start.
     *
     * @param  array<string, mixed>  $options
     */
    public function startByServiceName(string $serviceName, array $options = []): ?SystemServiceControl
    {
        return $this->fetch(new StartSystemServiceByServiceNameRequest($this->serverUuid, $serviceName, $options));
    }

    /**
     * Stop a service by name: PATCH /server/service/{server_uuid}/{service_name}/stop.
     *
     * @param  array<string, mixed>  $options
     */
    public function stopByServiceName(string $serviceName, array $options = []): ?SystemServiceControl
    {
        return $this->fetch(new StopSystemServiceByServiceNameRequest($this->serverUuid, $serviceName, $options));
    }
}
