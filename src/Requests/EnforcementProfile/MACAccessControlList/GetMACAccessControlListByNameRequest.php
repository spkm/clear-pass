<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\MACAccessControlList;

use spkm\ClearPass\Data\EnforcementProfile\MACAccessControlList;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a MAC Access Control List by name: GET /enforcement-profile-dur/mac-access-control-list/{product_name}/name/{name}.
 */
class GetMACAccessControlListByNameRequest extends ItemRequest
{
    protected ?string $dto = MACAccessControlList::class;

    public function __construct(protected string $productName, protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/mac-access-control-list/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
