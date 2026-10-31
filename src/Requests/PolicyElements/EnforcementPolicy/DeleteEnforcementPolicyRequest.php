<?php

namespace spkm\ClearPass\Requests\PolicyElements\EnforcementPolicy;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a enforcement policy: DELETE /enforcement-policy/{enforcement_policy_id}.
 */
class DeleteEnforcementPolicyRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $enforcementPolicyId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-policy/'.$this->enforcementPolicyId;
    }
}
