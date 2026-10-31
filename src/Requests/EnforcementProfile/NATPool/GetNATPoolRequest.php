<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\NATPool;

use spkm\ClearPass\Data\EnforcementProfile\NATPool;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a NAT Pool: GET /enforcement-profile-dur/nat-pool/{product_name}/{nat_pool_id}.
 */
class GetNATPoolRequest extends ItemRequest
{
    protected ?string $dto = NATPool::class;

    public function __construct(protected string $productName, protected int $natPoolId) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/nat-pool/'.rawurlencode((string) $this->productName).'/'.$this->natPoolId;
    }
}
