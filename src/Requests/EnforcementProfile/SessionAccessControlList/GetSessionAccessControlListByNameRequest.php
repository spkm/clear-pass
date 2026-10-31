<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\SessionAccessControlList;

use spkm\ClearPass\Data\EnforcementProfile\SessionAccessControlList;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Session Access Control List by name: GET /enforcement-profile-dur/session-access-control-list/{product_name}/name/{name}.
 */
class GetSessionAccessControlListByNameRequest extends ItemRequest
{
    protected ?string $dto = SessionAccessControlList::class;

    public function __construct(protected string $productName, protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/session-access-control-list/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
