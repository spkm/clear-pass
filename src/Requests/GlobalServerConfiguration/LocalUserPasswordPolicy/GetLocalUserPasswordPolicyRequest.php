<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\LocalUserPasswordPolicy;

use spkm\ClearPass\Data\GlobalServerConfiguration\LocalUserPasswordPolicy;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get the local user password policy: GET /local-user/password-policy.
 */
class GetLocalUserPasswordPolicyRequest extends ItemRequest
{
    protected ?string $dto = LocalUserPasswordPolicy::class;

    public function resolveEndpoint(): string
    {
        return '/local-user/password-policy';
    }
}
