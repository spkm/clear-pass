<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\CaptivePortalProfile;

use spkm\ClearPass\Data\EnforcementProfile\CaptivePortalProfile;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Captive Portal Profile: GET /enforcement-profile-dur/captive-portal-profile/{product_name}/{captive_portal_profile_id}.
 */
class GetCaptivePortalProfileRequest extends ItemRequest
{
    protected ?string $dto = CaptivePortalProfile::class;

    public function __construct(protected string $productName, protected int $captivePortalProfileId) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/captive-portal-profile/'.rawurlencode((string) $this->productName).'/'.$this->captivePortalProfileId;
    }
}
