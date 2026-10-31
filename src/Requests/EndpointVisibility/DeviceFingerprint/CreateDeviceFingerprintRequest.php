<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\DeviceFingerprint;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\DeviceFingerprint;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Post device fingerprint attributes for profiling: POST /device-profiler/device-fingerprint.
 */
class CreateDeviceFingerprintRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = DeviceFingerprint::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/device-profiler/device-fingerprint';
    }
}
