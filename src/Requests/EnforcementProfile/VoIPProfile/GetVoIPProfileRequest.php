<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\VoIPProfile;

use spkm\ClearPass\Data\EnforcementProfile\VoIPProfile;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a VoIP Profile: GET /enforcement-profile-dur/voip-profile/{product_name}/{voip_profile_id}.
 */
class GetVoIPProfileRequest extends ItemRequest
{
    protected ?string $dto = VoIPProfile::class;

    public function __construct(protected string $productName, protected int $voipProfileId) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/voip-profile/'.rawurlencode((string) $this->productName).'/'.$this->voipProfileId;
    }
}
