<?php

namespace spkm\ClearPass\Resources\EndpointVisibility;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\EndpointVisibility\DeviceFingerprint;
use spkm\ClearPass\Requests\EndpointVisibility\DeviceFingerprint\CreateDeviceFingerprintRequest;
use spkm\ClearPass\Requests\EndpointVisibility\DeviceFingerprint\DeleteDeviceFingerprintByMacOrIpRequest;
use spkm\ClearPass\Requests\EndpointVisibility\DeviceFingerprint\GetDeviceFingerprintByMacOrIpRequest;
use spkm\ClearPass\Resources\BaseResource;

/**
 * Manage Device Fingerprint Profiling, from ClearPass::endpointVisibility()->deviceFingerprint().
 *
 * @extends BaseResource<DeviceFingerprint>
 */
class DeviceFingerprintResource extends BaseResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, DeviceFingerprint::class);
    }

    /**
     * Post device fingerprint attributes for profiling: POST /device-profiler/device-fingerprint.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function create(array|Data $attributes = [], array $options = []): ?DeviceFingerprint
    {
        return $this->fetch(new CreateDeviceFingerprintRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Get profiled device: GET /device-profiler/device-fingerprint/{mac_or_ip}.
     */
    public function findByMacOrIp(string $macOrIp): ?DeviceFingerprint
    {
        return $this->fetchOrNull(new GetDeviceFingerprintByMacOrIpRequest($macOrIp));
    }

    /**
     * Delete fingerprint of profiled device: DELETE /device-profiler/device-fingerprint/{mac_or_ip}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByMacOrIp(string $macOrIp, array $options = []): bool
    {
        $this->fetch(new DeleteDeviceFingerprintByMacOrIpRequest($macOrIp, $options));

        return true;
    }
}
