<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\AdminUser;

use spkm\ClearPass\Data\GlobalServerConfiguration\AdminUser;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an admin user: GET /admin-user/{id}.
 */
class GetAdminUserRequest extends ItemRequest
{
    protected ?string $dto = AdminUser::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/admin-user/'.$this->id;
    }
}
