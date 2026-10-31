<?php

namespace spkm\ClearPass\Requests\Identities\Device;

use spkm\ClearPass\Data\Identities\Device;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a device account by MAC address: GET /device/mac/{macaddr}.
 */
class GetDeviceByMacRequest extends ItemRequest
{
    protected ?string $dto = Device::class;

    public function __construct(protected string $macaddr) {}

    public function resolveEndpoint(): string
    {
        return '/device/mac/'.rawurlencode((string) $this->macaddr);
    }
}
