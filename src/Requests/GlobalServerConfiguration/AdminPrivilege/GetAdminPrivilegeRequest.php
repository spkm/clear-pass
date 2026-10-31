<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\AdminPrivilege;

use spkm\ClearPass\Data\GlobalServerConfiguration\AdminPrivilege;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an admin privilege: GET /admin-privilege/{admin_privilege_id}.
 */
class GetAdminPrivilegeRequest extends ItemRequest
{
    protected ?string $dto = AdminPrivilege::class;

    public function __construct(protected int $adminPrivilegeId) {}

    public function resolveEndpoint(): string
    {
        return '/admin-privilege/'.$this->adminPrivilegeId;
    }
}
