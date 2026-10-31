<?php

namespace spkm\ClearPass\Resources\Integrations;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\Integrations\SyslogTarget;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\Integrations\SyslogTarget\CreateSyslogTargetRequest;
use spkm\ClearPass\Requests\Integrations\SyslogTarget\DeleteSyslogTargetByHostAddressRequest;
use spkm\ClearPass\Requests\Integrations\SyslogTarget\DeleteSyslogTargetRequest;
use spkm\ClearPass\Requests\Integrations\SyslogTarget\GetSyslogTargetByHostAddressRequest;
use spkm\ClearPass\Requests\Integrations\SyslogTarget\GetSyslogTargetRequest;
use spkm\ClearPass\Requests\Integrations\SyslogTarget\GetSyslogTargetsRequest;
use spkm\ClearPass\Requests\Integrations\SyslogTarget\ReplaceSyslogTargetByHostAddressRequest;
use spkm\ClearPass\Requests\Integrations\SyslogTarget\ReplaceSyslogTargetRequest;
use spkm\ClearPass\Requests\Integrations\SyslogTarget\UpdateSyslogTargetByHostAddressRequest;
use spkm\ClearPass\Requests\Integrations\SyslogTarget\UpdateSyslogTargetRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage syslog target, from ClearPass::integrations()->syslogTargets().
 *
 * @extends Builder<SyslogTarget>
 */
class SyslogTargetResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, SyslogTarget::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSyslogTargetsRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateSyslogTargetRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetSyslogTargetRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateSyslogTargetRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceSyslogTargetRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteSyslogTargetRequest((int) $id, $options);
    }

    /**
     * Get a syslog target by host_address: GET /syslog-target/host-address/{host_address}.
     */
    public function findByHostAddress(string $hostAddress): ?SyslogTarget
    {
        return $this->fetchOrNull(new GetSyslogTargetByHostAddressRequest($hostAddress));
    }

    /**
     * Update some fields of a syslog target by host_address: PATCH /syslog-target/host-address/{host_address}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByHostAddress(string $hostAddress, array|Data $attributes = [], array $options = []): ?SyslogTarget
    {
        return $this->fetch(new UpdateSyslogTargetByHostAddressRequest($hostAddress, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a syslog target by host_address: PUT /syslog-target/host-address/{host_address}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByHostAddress(string $hostAddress, array|Data $attributes = [], array $options = []): ?SyslogTarget
    {
        return $this->fetch(new ReplaceSyslogTargetByHostAddressRequest($hostAddress, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a syslog target by host_address: DELETE /syslog-target/host-address/{host_address}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByHostAddress(string $hostAddress, array $options = []): bool
    {
        $this->fetch(new DeleteSyslogTargetByHostAddressRequest($hostAddress, $options));

        return true;
    }
}
