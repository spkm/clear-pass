<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\NATPool;

use spkm\ClearPass\Data\EnforcementProfile\NATPool;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a NAT Pool by name: GET /enforcement-profile-dur/nat-pool/{product_name}/name/{name}.
 */
class GetNATPoolByNameRequest extends ItemRequest
{
    protected ?string $dto = NATPool::class;

    public function __construct(protected string $productName, protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/nat-pool/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
