<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\MACAccessControlList;

use spkm\ClearPass\Data\EnforcementProfile\MACAccessControlList;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a MAC Access Control List: GET /enforcement-profile-dur/mac-access-control-list/{product_name}/{mac_access_control_list_id}.
 */
class GetMACAccessControlListRequest extends ItemRequest
{
    protected ?string $dto = MACAccessControlList::class;

    public function __construct(protected string $productName, protected int $macAccessControlListId) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/mac-access-control-list/'.rawurlencode((string) $this->productName).'/'.$this->macAccessControlListId;
    }
}
