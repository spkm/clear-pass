<?php

namespace spkm\ClearPass\Requests\PolicyElements\EnforcementPolicy;

use spkm\ClearPass\Data\PolicyElements\EnforcementPolicy;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a enforcement policy: GET /enforcement-policy/{enforcement_policy_id}.
 */
class GetEnforcementPolicyRequest extends ItemRequest
{
    protected ?string $dto = EnforcementPolicy::class;

    public function __construct(protected int $enforcementPolicyId) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-policy/'.$this->enforcementPolicyId;
    }
}
