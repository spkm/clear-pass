<?php

namespace spkm\ClearPass\Requests\CertificateAuthority\OnboardDevice;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\CertificateAuthority\OnboardDevice;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update settings for a device: PATCH /onboard/device/{id}.
 */
class UpdateOnboardDeviceRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = OnboardDevice::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int|string $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/onboard/device/'.rawurlencode((string) $this->id);
    }
}
