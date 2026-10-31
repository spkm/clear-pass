<?php

namespace spkm\ClearPass\Requests\Identities\DenyListedUsers;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a deny listed user: DELETE /deny-listed-users/{deny_listed_users_id}.
 */
class DeleteDenyListedUserRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $denyListedUsersId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/deny-listed-users/'.$this->denyListedUsersId;
    }
}
