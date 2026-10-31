<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\Policy;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a Policy: DELETE /enforcement-profile-dur/policy/{product_name}/{policy_id}.
 */
class DeletePolicyRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected int $policyId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/policy/'.rawurlencode((string) $this->productName).'/'.$this->policyId;
    }
}
