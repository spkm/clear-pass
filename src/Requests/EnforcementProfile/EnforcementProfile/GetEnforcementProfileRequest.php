<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\EnforcementProfile;

use spkm\ClearPass\Data\EnforcementProfile\EnforcementProfile;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an Enforcement Profile: GET /enforcement-profile/{enforcement_profile_id}.
 */
class GetEnforcementProfileRequest extends ItemRequest
{
    protected ?string $dto = EnforcementProfile::class;

    public function __construct(protected int $enforcementProfileId) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile/'.$this->enforcementProfileId;
    }
}
