<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\AdminPrivilege;

use spkm\ClearPass\Data\GlobalServerConfiguration\AdminPrivilege;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an admin privilege by name: GET /admin-privilege/name/{name}.
 */
class GetAdminPrivilegeByNameRequest extends ItemRequest
{
    protected ?string $dto = AdminPrivilege::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/admin-privilege/name/'.rawurlencode((string) $this->name);
    }
}
