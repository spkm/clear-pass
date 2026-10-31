<?php

namespace spkm\ClearPass\Requests\Identities\DenyListedUsers;

use spkm\ClearPass\Data\Identities\DenyListedUsers;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a deny listed user: GET /deny-listed-users/{deny_listed_users_id}.
 */
class GetDenyListedUserRequest extends ItemRequest
{
    protected ?string $dto = DenyListedUsers::class;

    public function __construct(protected int $denyListedUsersId) {}

    public function resolveEndpoint(): string
    {
        return '/deny-listed-users/'.$this->denyListedUsersId;
    }
}
