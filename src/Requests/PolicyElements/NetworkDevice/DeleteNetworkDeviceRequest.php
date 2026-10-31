<?php

namespace spkm\ClearPass\Requests\PolicyElements\NetworkDevice;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a network device: DELETE /network-device/{network_device_id}.
 */
class DeleteNetworkDeviceRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $networkDeviceId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-device/'.$this->networkDeviceId;
    }
}
