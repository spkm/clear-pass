<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\CaptivePortalProfile;

use spkm\ClearPass\Data\EnforcementProfile\CaptivePortalProfile;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Captive Portal Profile by name: GET /enforcement-profile-dur/captive-portal-profile/{product_name}/name/{name}.
 */
class GetCaptivePortalProfileByNameRequest extends ItemRequest
{
    protected ?string $dto = CaptivePortalProfile::class;

    public function __construct(protected string $productName, protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/captive-portal-profile/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
