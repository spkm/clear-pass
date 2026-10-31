<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\StatelessAccessControlList;

use spkm\ClearPass\Data\EnforcementProfile\StatelessAccessControlList;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Stateless Access Control List by name: GET /enforcement-profile-dur/stateless-access-control-list/{product_name}/name/{name}.
 */
class GetStatelessAccessControlListByNameRequest extends ItemRequest
{
    protected ?string $dto = StatelessAccessControlList::class;

    public function __construct(protected string $productName, protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/stateless-access-control-list/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
