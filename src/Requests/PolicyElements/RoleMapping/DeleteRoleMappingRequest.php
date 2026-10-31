<?php

namespace spkm\ClearPass\Requests\PolicyElements\RoleMapping;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a role mapping: DELETE /role-mapping/{role_mapping_id}.
 */
class DeleteRoleMappingRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $roleMappingId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/role-mapping/'.$this->roleMappingId;
    }
}
