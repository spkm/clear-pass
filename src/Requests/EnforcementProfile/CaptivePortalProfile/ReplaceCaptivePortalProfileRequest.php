<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\CaptivePortalProfile;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\CaptivePortalProfile;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a Captive Portal Profile: PUT /enforcement-profile-dur/captive-portal-profile/{product_name}/{captive_portal_profile_id}.
 */
class ReplaceCaptivePortalProfileRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = CaptivePortalProfile::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected int $captivePortalProfileId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/captive-portal-profile/'.rawurlencode((string) $this->productName).'/'.$this->captivePortalProfileId;
    }
}
