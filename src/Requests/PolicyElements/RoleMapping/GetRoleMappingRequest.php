<?php

namespace spkm\ClearPass\Requests\PolicyElements\RoleMapping;

use spkm\ClearPass\Data\PolicyElements\RoleMapping;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a role mapping: GET /role-mapping/{role_mapping_id}.
 */
class GetRoleMappingRequest extends ItemRequest
{
    protected ?string $dto = RoleMapping::class;

    public function __construct(protected int $roleMappingId) {}

    public function resolveEndpoint(): string
    {
        return '/role-mapping/'.$this->roleMappingId;
    }
}
