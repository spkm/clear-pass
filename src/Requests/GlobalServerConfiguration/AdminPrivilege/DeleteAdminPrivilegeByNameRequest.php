<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\AdminPrivilege;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an admin privilege by name: DELETE /admin-privilege/name/{name}.
 */
class DeleteAdminPrivilegeByNameRequest extends DeleteRequest
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
        return '/admin-privilege/name/'.rawurlencode((string) $this->name);
    }
}
