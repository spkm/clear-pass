<?php

namespace spkm\ClearPass\Resources\LocalServerConfiguration;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\LocalServerConfiguration\CppmVersion;
use spkm\ClearPass\Data\LocalServerConfiguration\ServerFipsResponse;
use spkm\ClearPass\Data\LocalServerConfiguration\ServerVersionResponse;
use spkm\ClearPass\Requests\LocalServerConfiguration\CppmVersion\GetCppmVersionRequest;
use spkm\ClearPass\Requests\LocalServerConfiguration\ServerFips\GetServerFipsRequest;
use spkm\ClearPass\Requests\LocalServerConfiguration\ServerVersion\GetServerVersionRequest;
use spkm\ClearPass\Resources\BaseResource;

/**
 * The LocalServerConfiguration API: ClearPass::localServerConfiguration().
 *
 * @extends BaseResource<Data>
 */
class LocalServerConfigurationResources extends BaseResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Manage Application access controls.
     */
    public function accessControls(string $serverUuid): AccessControlResource
    {
        return new AccessControlResource($this->connector, $serverUuid);
    }

    /**
     * Manage AD Domains.
     */
    public function adDomains(string $serverUuid): ADDomainResource
    {
        return new ADDomainResource($this->connector, $serverUuid);
    }

    /**
     * Get Cppm version: GET /cppm-version.
     */
    public function cppmVersion(): ?CppmVersion
    {
        return $this->fetch(new GetCppmVersionRequest);
    }

    /**
     * Manage cluster servers and per-server configuration.
     */
    public function serverConfigurations(): ServerConfigurationResource
    {
        return new ServerConfigurationResource($this->connector);
    }

    /**
     * Get server FIPS mode information: GET /server/fips.
     */
    public function serverFips(): ?ServerFipsResponse
    {
        return $this->fetch(new GetServerFipsRequest);
    }

    /**
     * Manage server snmp settings.
     */
    public function serverSnmp(string $serverUuid): ServerSnmpResource
    {
        return new ServerSnmpResource($this->connector, $serverUuid);
    }

    /**
     * Get server version information: GET /server/version.
     */
    public function serverVersion(): ?ServerVersionResponse
    {
        return $this->fetch(new GetServerVersionRequest);
    }

    /**
     * Manage service parameters.
     */
    public function serviceParameter(string $serverUuid, int $serviceId): ServiceParameterResource
    {
        return new ServiceParameterResource($this->connector, $serverUuid, $serviceId);
    }

    /**
     * Control services running on a server.
     */
    public function systemServiceControls(string $serverUuid): SystemServiceControlResource
    {
        return new SystemServiceControlResource($this->connector, $serverUuid);
    }
}
