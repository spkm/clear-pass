<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\PolicerProfile;

use spkm\ClearPass\Data\EnforcementProfile\PolicerProfile;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Policer Profile: GET /enforcement-profile-dur/policer-profile/{product_name}/{policer_profile_id}.
 */
class GetPolicerProfileRequest extends ItemRequest
{
    protected ?string $dto = PolicerProfile::class;

    public function __construct(protected string $productName, protected int $policerProfileId) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/policer-profile/'.rawurlencode((string) $this->productName).'/'.$this->policerProfileId;
    }
}
