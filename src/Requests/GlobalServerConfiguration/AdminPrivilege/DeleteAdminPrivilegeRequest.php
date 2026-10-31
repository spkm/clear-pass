<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\AdminPrivilege;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an admin privilege: DELETE /admin-privilege/{admin_privilege_id}.
 */
class DeleteAdminPrivilegeRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $adminPrivilegeId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/admin-privilege/'.$this->adminPrivilegeId;
    }
}
