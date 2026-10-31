<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\EnforcementProfile;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an Enforcement Profile: DELETE /enforcement-profile/{enforcement_profile_id}.
 */
class DeleteEnforcementProfileRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $enforcementProfileId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile/'.$this->enforcementProfileId;
    }
}
