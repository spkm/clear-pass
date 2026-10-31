<?php

namespace spkm\ClearPass\Resources\Identities;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\Identities\Device;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\Identities\Device\CreateDeviceRequest;
use spkm\ClearPass\Requests\Identities\Device\DeleteDeviceByMacRequest;
use spkm\ClearPass\Requests\Identities\Device\DeleteDeviceRequest;
use spkm\ClearPass\Requests\Identities\Device\GetDeviceByMacRequest;
use spkm\ClearPass\Requests\Identities\Device\GetDeviceRequest;
use spkm\ClearPass\Requests\Identities\Device\GetDevicesRequest;
use spkm\ClearPass\Requests\Identities\Device\ReplaceDeviceByMacRequest;
use spkm\ClearPass\Requests\Identities\Device\ReplaceDeviceRequest;
use spkm\ClearPass\Requests\Identities\Device\UpdateDeviceByMacRequest;
use spkm\ClearPass\Requests\Identities\Device\UpdateDeviceRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage device accounts, from ClearPass::identities()->devices().
 *
 * @extends Builder<Device>
 */
class DeviceResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, Device::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetDevicesRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateDeviceRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetDeviceRequest($id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateDeviceRequest($id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceDeviceRequest($id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteDeviceRequest($id, $options);
    }

    /**
     * Get a device account by MAC address: GET /device/mac/{macaddr}.
     */
    public function findByMac(string $macaddr): ?Device
    {
        return $this->fetchOrNull(new GetDeviceByMacRequest($macaddr));
    }

    /**
     * Update some fields of a device account by MAC address: PATCH /device/mac/{macaddr}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options  Query options: change_of_authorization
     */
    public function updateByMac(string $macaddr, array|Data $attributes = [], array $options = []): ?Device
    {
        return $this->fetch(new UpdateDeviceByMacRequest($macaddr, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a device account by MAC address: PUT /device/mac/{macaddr}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options  Query options: change_of_authorization
     */
    public function replaceByMac(string $macaddr, array|Data $attributes = [], array $options = []): ?Device
    {
        return $this->fetch(new ReplaceDeviceByMacRequest($macaddr, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a device account by MAC address: DELETE /device/mac/{macaddr}.
     *
     * @param  array<string, mixed>  $options  Query options: change_of_authorization
     */
    public function deleteByMac(string $macaddr, array $options = []): bool
    {
        $this->fetch(new DeleteDeviceByMacRequest($macaddr, $options));

        return true;
    }
}
