<?php

namespace spkm\ClearPass\Resources\LocalServerConfiguration;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\LocalServerConfiguration\ServerSnmp;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\LocalServerConfiguration\ServerSnmp\GetServerSnmpRequest;
use spkm\ClearPass\Requests\LocalServerConfiguration\ServerSnmp\ReplaceServerSnmpRequest;
use spkm\ClearPass\Requests\LocalServerConfiguration\ServerSnmp\UpdateServerSnmpRequest;
use spkm\ClearPass\Resources\SingletonResource;

/**
 * Manage server snmp settings, from ClearPass::localServerConfiguration()->serverSnmp().
 *
 * @extends SingletonResource<ServerSnmp>
 */
class ServerSnmpResource extends SingletonResource
{
    public function __construct(ClearPassConnector $connector, protected string $serverUuid)
    {
        parent::__construct($connector, ServerSnmp::class);
    }

    protected function getRequest(array $options): ClearPassRequest
    {
        return new GetServerSnmpRequest($this->serverUuid);
    }

    protected function replaceRequest(array $body, array $options): ClearPassRequest
    {
        return new ReplaceServerSnmpRequest($this->serverUuid, $body, $options);
    }

    protected function updateRequest(array $body, array $options): ClearPassRequest
    {
        return new UpdateServerSnmpRequest($this->serverUuid, $body, $options);
    }
}
