<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\AdminUser;

use spkm\ClearPass\Data\GlobalServerConfiguration\AdminUser;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an admin user by user_id: GET /admin-user/user-id/{user_id}.
 */
class GetAdminUserByUserIdRequest extends ItemRequest
{
    protected ?string $dto = AdminUser::class;

    public function __construct(protected string $userId) {}

    public function resolveEndpoint(): string
    {
        return '/admin-user/user-id/'.rawurlencode((string) $this->userId);
    }
}
