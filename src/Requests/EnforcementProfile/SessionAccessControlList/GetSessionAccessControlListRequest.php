<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\SessionAccessControlList;

use spkm\ClearPass\Data\EnforcementProfile\SessionAccessControlList;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Session Access Control List: GET /enforcement-profile-dur/session-access-control-list/{product_name}/{session_access_control_list_id}.
 */
class GetSessionAccessControlListRequest extends ItemRequest
{
    protected ?string $dto = SessionAccessControlList::class;

    public function __construct(protected string $productName, protected int $sessionAccessControlListId) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/session-access-control-list/'.rawurlencode((string) $this->productName).'/'.$this->sessionAccessControlListId;
    }
}
