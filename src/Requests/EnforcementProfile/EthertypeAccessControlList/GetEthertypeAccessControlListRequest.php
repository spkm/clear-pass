<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\EthertypeAccessControlList;

use spkm\ClearPass\Data\EnforcementProfile\EthertypeAccessControlList;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Ethertype Access Control List: GET /enforcement-profile-dur/ethertype-access-control-list/{product_name}/{ethertype_access_control_list_id}.
 */
class GetEthertypeAccessControlListRequest extends ItemRequest
{
    protected ?string $dto = EthertypeAccessControlList::class;

    public function __construct(protected string $productName, protected int $ethertypeAccessControlListId) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/ethertype-access-control-list/'.rawurlencode((string) $this->productName).'/'.$this->ethertypeAccessControlListId;
    }
}
