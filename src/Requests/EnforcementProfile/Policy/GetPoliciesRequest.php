<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\Policy;

use spkm\ClearPass\Data\EnforcementProfile\Policy;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * GET a list of Policies: GET /enforcement-profile-dur/policy/{product_name}.
 */
class GetPoliciesRequest extends ListRequest
{
    protected ?string $dto = Policy::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $productName, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/policy/'.rawurlencode((string) $this->productName);
    }
}
