<?php

namespace spkm\ClearPass\Requests\PolicyElements\Role;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a role by name: DELETE /role/name/{name}.
 */
class DeleteRoleByNameRequest extends DeleteRequest
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
        return '/role/name/'.rawurlencode((string) $this->name);
    }
}
