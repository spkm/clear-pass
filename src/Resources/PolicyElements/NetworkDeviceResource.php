<?php

namespace spkm\ClearPass\Resources\PolicyElements;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\PolicyElements\NetworkDevice;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ListRequest;
use spkm\ClearPass\Requests\PolicyElements\NetworkDevice\CreateNetworkDeviceRequest;
use spkm\ClearPass\Requests\PolicyElements\NetworkDevice\DeleteNetworkDeviceByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\NetworkDevice\DeleteNetworkDeviceRequest;
use spkm\ClearPass\Requests\PolicyElements\NetworkDevice\GetNetworkDeviceByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\NetworkDevice\GetNetworkDeviceRequest;
use spkm\ClearPass\Requests\PolicyElements\NetworkDevice\GetNetworkDevicesRequest;
use spkm\ClearPass\Requests\PolicyElements\NetworkDevice\ReplaceNetworkDeviceByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\NetworkDevice\ReplaceNetworkDeviceRequest;
use spkm\ClearPass\Requests\PolicyElements\NetworkDevice\UpdateNetworkDeviceByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\NetworkDevice\UpdateNetworkDeviceRequest;

/**
 * Manage network devices, from ClearPass::policyElements()->networkDevices().
 *
 * @extends Builder<NetworkDevice>
 */
class NetworkDeviceResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, NetworkDevice::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetNetworkDevicesRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateNetworkDeviceRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetNetworkDeviceRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateNetworkDeviceRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceNetworkDeviceRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteNetworkDeviceRequest((int) $id, $options);
    }

    /**
     * Get a network device by name: GET /network-device/name/{name}.
     */
    public function findByName(string $name): ?NetworkDevice
    {
        return $this->fetchOrNull(new GetNetworkDeviceByNameRequest($name));
    }

    /**
     * Update some fields of a network device by name: PATCH /network-device/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?NetworkDevice
    {
        return $this->fetch(new UpdateNetworkDeviceByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a network device by name: PUT /network-device/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?NetworkDevice
    {
        return $this->fetch(new ReplaceNetworkDeviceByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a network device by name: DELETE /network-device/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteNetworkDeviceByNameRequest($name, $options));

        return true;
    }
}
