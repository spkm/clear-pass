<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\DeviceFingerprint;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete fingerprint of profiled device: DELETE /device-profiler/device-fingerprint/{mac_or_ip}.
 */
class DeleteDeviceFingerprintByMacOrIpRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $macOrIp, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/device-profiler/device-fingerprint/'.rawurlencode((string) $this->macOrIp);
    }
}
