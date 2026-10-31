<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\CaptivePortalProfile;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\CaptivePortalProfile;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Add a Captive Portal Profile: POST /enforcement-profile-dur/captive-portal-profile/{product_name}.
 */
class CreateCaptivePortalProfileRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = CaptivePortalProfile::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/captive-portal-profile/'.rawurlencode((string) $this->productName);
    }
}
