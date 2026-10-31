<?php

namespace spkm\ClearPass\Requests\CertificateAuthority\OnboardDevice;

use spkm\ClearPass\Data\CertificateAuthority\OnboardDevice;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a device: GET /onboard/device/{id}.
 */
class GetOnboardDeviceRequest extends ItemRequest
{
    protected ?string $dto = OnboardDevice::class;

    public function __construct(protected int|string $id) {}

    public function resolveEndpoint(): string
    {
        return '/onboard/device/'.rawurlencode((string) $this->id);
    }
}
