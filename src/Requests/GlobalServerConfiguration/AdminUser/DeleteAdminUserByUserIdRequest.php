<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\AdminUser;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an admin user by user_id: DELETE /admin-user/user-id/{user_id}.
 */
class DeleteAdminUserByUserIdRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $userId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/admin-user/user-id/'.rawurlencode((string) $this->userId);
    }
}
