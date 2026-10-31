<?php

namespace spkm\ClearPass\Requests\PolicyElements\Role;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a role: DELETE /role/{role_id}.
 */
class DeleteRoleRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $roleId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/role/'.$this->roleId;
    }
}
