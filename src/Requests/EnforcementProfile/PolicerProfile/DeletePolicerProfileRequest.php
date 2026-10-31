<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\PolicerProfile;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a Policer Profile: DELETE /enforcement-profile-dur/policer-profile/{product_name}/{policer_profile_id}.
 */
class DeletePolicerProfileRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected int $policerProfileId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/policer-profile/'.rawurlencode((string) $this->productName).'/'.$this->policerProfileId;
    }
}
