<?php

namespace spkm\ClearPass\Requests\PolicyElements\EnforcementPolicy;

use spkm\ClearPass\Data\PolicyElements\EnforcementPolicy;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a enforcement policy by name: GET /enforcement-policy/name/{name}.
 */
class GetEnforcementPolicyByNameRequest extends ItemRequest
{
    protected ?string $dto = EnforcementPolicy::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-policy/name/'.rawurlencode((string) $this->name);
    }
}
