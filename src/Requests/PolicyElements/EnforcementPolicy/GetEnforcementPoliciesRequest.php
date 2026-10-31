<?php

namespace spkm\ClearPass\Requests\PolicyElements\EnforcementPolicy;

use spkm\ClearPass\Data\PolicyElements\EnforcementPolicy;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of enforcement policies: GET /enforcement-policy.
 */
class GetEnforcementPoliciesRequest extends ListRequest
{
    protected ?string $dto = EnforcementPolicy::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-policy';
    }
}
