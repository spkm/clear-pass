<?php

namespace spkm\ClearPass\Resources\PolicyElements;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\PolicyElements\NetworkDeviceGroup;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ListRequest;
use spkm\ClearPass\Requests\PolicyElements\NetworkDeviceGroup\CreateNetworkDeviceGroupRequest;
use spkm\ClearPass\Requests\PolicyElements\NetworkDeviceGroup\DeleteNetworkDeviceGroupByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\NetworkDeviceGroup\DeleteNetworkDeviceGroupRequest;
use spkm\ClearPass\Requests\PolicyElements\NetworkDeviceGroup\GetNetworkDeviceGroupByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\NetworkDeviceGroup\GetNetworkDeviceGroupRequest;
use spkm\ClearPass\Requests\PolicyElements\NetworkDeviceGroup\GetNetworkDeviceGroupsRequest;
use spkm\ClearPass\Requests\PolicyElements\NetworkDeviceGroup\ReplaceNetworkDeviceGroupByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\NetworkDeviceGroup\ReplaceNetworkDeviceGroupRequest;
use spkm\ClearPass\Requests\PolicyElements\NetworkDeviceGroup\UpdateNetworkDeviceGroupByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\NetworkDeviceGroup\UpdateNetworkDeviceGroupRequest;

/**
 * Manage network device groups, from ClearPass::policyElements()->networkDeviceGroups().
 *
 * @extends Builder<NetworkDeviceGroup>
 */
class NetworkDeviceGroupResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, NetworkDeviceGroup::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetNetworkDeviceGroupsRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateNetworkDeviceGroupRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetNetworkDeviceGroupRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateNetworkDeviceGroupRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceNetworkDeviceGroupRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteNetworkDeviceGroupRequest((int) $id, $options);
    }

    /**
     * Get a network device group by name: GET /network-device-group/name/{name}.
     */
    public function findByName(string $name): ?NetworkDeviceGroup
    {
        return $this->fetchOrNull(new GetNetworkDeviceGroupByNameRequest($name));
    }

    /**
     * Update some fields of a network device group by name: PATCH /network-device-group/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?NetworkDeviceGroup
    {
        return $this->fetch(new UpdateNetworkDeviceGroupByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a network device group by name: PUT /network-device-group/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?NetworkDeviceGroup
    {
        return $this->fetch(new ReplaceNetworkDeviceGroupByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a network device group by name: DELETE /network-device-group/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteNetworkDeviceGroupByNameRequest($name, $options));

        return true;
    }
}
