<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\DeviceFingerprint;

use spkm\ClearPass\Data\EndpointVisibility\DeviceFingerprint;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get profiled device: GET /device-profiler/device-fingerprint/{mac_or_ip}.
 */
class GetDeviceFingerprintByMacOrIpRequest extends ItemRequest
{
    protected ?string $dto = DeviceFingerprint::class;

    public function __construct(protected string $macOrIp) {}

    public function resolveEndpoint(): string
    {
        return '/device-profiler/device-fingerprint/'.rawurlencode((string) $this->macOrIp);
    }
}
