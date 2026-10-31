<?php

namespace spkm\ClearPass\Requests\Identities\GuestUser;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a guest account by username: DELETE /guest/username/{username}.
 */
class DeleteGuestUserByUsernameRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: change_of_authorization
     */
    public function __construct(protected string $username, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/guest/username/'.rawurlencode((string) $this->username);
    }
}
