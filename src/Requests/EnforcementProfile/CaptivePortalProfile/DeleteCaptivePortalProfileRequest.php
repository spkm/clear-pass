<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\CaptivePortalProfile;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a Captive Portal Profile: DELETE /enforcement-profile-dur/captive-portal-profile/{product_name}/{captive_portal_profile_id}.
 */
class DeleteCaptivePortalProfileRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected int $captivePortalProfileId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/captive-portal-profile/'.rawurlencode((string) $this->productName).'/'.$this->captivePortalProfileId;
    }
}
