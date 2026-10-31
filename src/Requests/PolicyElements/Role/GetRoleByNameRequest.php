<?php

namespace spkm\ClearPass\Requests\PolicyElements\Role;

use spkm\ClearPass\Data\PolicyElements\Role;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a role by name: GET /role/name/{name}.
 */
class GetRoleByNameRequest extends ItemRequest
{
    protected ?string $dto = Role::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/role/name/'.rawurlencode((string) $this->name);
    }
}
