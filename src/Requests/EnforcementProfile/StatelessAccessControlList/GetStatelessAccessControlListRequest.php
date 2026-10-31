<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\StatelessAccessControlList;

use spkm\ClearPass\Data\EnforcementProfile\StatelessAccessControlList;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Stateless Access Control List: GET /enforcement-profile-dur/stateless-access-control-list/{product_name}/{stateless_access_control_list_id}.
 */
class GetStatelessAccessControlListRequest extends ItemRequest
{
    protected ?string $dto = StatelessAccessControlList::class;

    public function __construct(protected string $productName, protected int $statelessAccessControlListId) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/stateless-access-control-list/'.rawurlencode((string) $this->productName).'/'.$this->statelessAccessControlListId;
    }
}
