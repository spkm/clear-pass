<?php

namespace spkm\ClearPass\Requests\Identities\Device;

use spkm\ClearPass\Data\Identities\Device;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a device account: GET /device/{device_id}.
 */
class GetDeviceRequest extends ItemRequest
{
    protected ?string $dto = Device::class;

    public function __construct(protected int|string $deviceId) {}

    public function resolveEndpoint(): string
    {
        return '/device/'.rawurlencode((string) $this->deviceId);
    }
}
