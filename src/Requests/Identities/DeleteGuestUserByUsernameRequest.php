<?php

namespace spkm\ClearPass\Requests\Identities;

/**
 * The first version's request to delete a guest account by username.
 *
 * @deprecated Use Identities\GuestUser\DeleteGuestUserByUsernameRequest (or ClearPass::identities()->guestUsers()).
 */
class DeleteGuestUserByUsernameRequest extends GuestUser\DeleteGuestUserByUsernameRequest
{
    /**
     * @param  array<string, mixed>  $queryParameters
     */
    public function __construct(string $username, array $queryParameters = [])
    {
        parent::__construct($username, $queryParameters);
    }
}
