<?php

namespace spkm\ClearPass\Requests\PolicyElements\RoleMapping;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a role mapping by name: DELETE /role-mapping/name/{name}.
 */
class DeleteRoleMappingByNameRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/role-mapping/name/'.rawurlencode((string) $this->name);
    }
}
