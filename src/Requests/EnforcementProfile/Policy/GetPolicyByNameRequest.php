<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\Policy;

use spkm\ClearPass\Data\EnforcementProfile\Policy;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Policy by name: GET /enforcement-profile-dur/policy/{product_name}/name/{name}.
 */
class GetPolicyByNameRequest extends ItemRequest
{
    protected ?string $dto = Policy::class;

    public function __construct(protected string $productName, protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/policy/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
