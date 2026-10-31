<?php

namespace spkm\ClearPass\Requests\PolicyElements\NetworkDeviceGroup;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a network device group: DELETE /network-device-group/{network_device_group_id}.
 */
class DeleteNetworkDeviceGroupRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $networkDeviceGroupId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-device-group/'.$this->networkDeviceGroupId;
    }
}
