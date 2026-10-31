<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\AdminUserPasswordPolicy;

use spkm\ClearPass\Data\GlobalServerConfiguration\AdminUserPasswordPolicy;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get the admin user password policies: GET /admin-user/password-policy.
 */
class GetAdminUserPasswordPolicyRequest extends ItemRequest
{
    protected ?string $dto = AdminUserPasswordPolicy::class;

    public function resolveEndpoint(): string
    {
        return '/admin-user/password-policy';
    }
}
