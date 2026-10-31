<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\NATPool;

use spkm\ClearPass\Data\EnforcementProfile\NATPool;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * GET a list of NAT Pools: GET /enforcement-profile-dur/nat-pool/{product_name}.
 */
class GetNATPoolsRequest extends ListRequest
{
    protected ?string $dto = NATPool::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $productName, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/nat-pool/'.rawurlencode((string) $this->productName);
    }
}
