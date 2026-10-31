<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\EthertypeAccessControlList;

use spkm\ClearPass\Data\EnforcementProfile\EthertypeAccessControlList;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Ethertype Access Control List by name: GET /enforcement-profile-dur/ethertype-access-control-list/{product_name}/name/{name}.
 */
class GetEthertypeAccessControlListByNameRequest extends ItemRequest
{
    protected ?string $dto = EthertypeAccessControlList::class;

    public function __construct(protected string $productName, protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/ethertype-access-control-list/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
