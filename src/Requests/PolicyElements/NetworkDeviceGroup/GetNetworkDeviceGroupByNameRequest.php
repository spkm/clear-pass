<?php

namespace spkm\ClearPass\Requests\PolicyElements\NetworkDeviceGroup;

use spkm\ClearPass\Data\PolicyElements\NetworkDeviceGroup;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a network device group by name: GET /network-device-group/name/{name}.
 */
class GetNetworkDeviceGroupByNameRequest extends ItemRequest
{
    protected ?string $dto = NetworkDeviceGroup::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/network-device-group/name/'.rawurlencode((string) $this->name);
    }
}
