<?php

namespace spkm\ClearPass\Requests\PolicyElements\NetworkDeviceGroup;

use spkm\ClearPass\Data\PolicyElements\NetworkDeviceGroup;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a network device group: GET /network-device-group/{network_device_group_id}.
 */
class GetNetworkDeviceGroupRequest extends ItemRequest
{
    protected ?string $dto = NetworkDeviceGroup::class;

    public function __construct(protected int $networkDeviceGroupId) {}

    public function resolveEndpoint(): string
    {
        return '/network-device-group/'.$this->networkDeviceGroupId;
    }
}
