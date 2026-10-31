<?php

namespace spkm\ClearPass\Requests\PolicyElements\NetworkDevice;

use spkm\ClearPass\Data\PolicyElements\NetworkDevice;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a network device: GET /network-device/{network_device_id}.
 */
class GetNetworkDeviceRequest extends ItemRequest
{
    protected ?string $dto = NetworkDevice::class;

    public function __construct(protected int $networkDeviceId) {}

    public function resolveEndpoint(): string
    {
        return '/network-device/'.$this->networkDeviceId;
    }
}
