<?php

namespace spkm\ClearPass\Requests\PolicyElements\Role;

use spkm\ClearPass\Data\PolicyElements\Role;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a role: GET /role/{role_id}.
 */
class GetRoleRequest extends ItemRequest
{
    protected ?string $dto = Role::class;

    public function __construct(protected int $roleId) {}

    public function resolveEndpoint(): string
    {
        return '/role/'.$this->roleId;
    }
}
