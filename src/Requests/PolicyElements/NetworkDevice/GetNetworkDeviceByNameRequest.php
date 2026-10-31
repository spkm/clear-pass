<?php

namespace spkm\ClearPass\Requests\PolicyElements\NetworkDevice;

use spkm\ClearPass\Data\PolicyElements\NetworkDevice;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a network device by name: GET /network-device/name/{name}.
 */
class GetNetworkDeviceByNameRequest extends ItemRequest
{
    protected ?string $dto = NetworkDevice::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/network-device/name/'.rawurlencode((string) $this->name);
    }
}
