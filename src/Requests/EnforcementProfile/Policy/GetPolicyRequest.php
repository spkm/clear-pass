<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\Policy;

use spkm\ClearPass\Data\EnforcementProfile\Policy;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Policy: GET /enforcement-profile-dur/policy/{product_name}/{policy_id}.
 */
class GetPolicyRequest extends ItemRequest
{
    protected ?string $dto = Policy::class;

    public function __construct(protected string $productName, protected int $policyId) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/policy/'.rawurlencode((string) $this->productName).'/'.$this->policyId;
    }
}
