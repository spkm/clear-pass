<?php

namespace spkm\ClearPass\Requests\PolicyElements\RoleMapping;

use spkm\ClearPass\Data\PolicyElements\RoleMapping;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a role mapping by name: GET /role-mapping/name/{name}.
 */
class GetRoleMappingByNameRequest extends ItemRequest
{
    protected ?string $dto = RoleMapping::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/role-mapping/name/'.rawurlencode((string) $this->name);
    }
}
