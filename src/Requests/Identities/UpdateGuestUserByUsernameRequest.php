<?php

namespace spkm\ClearPass\Requests\Identities;

use JsonSerializable;
use spkm\ClearPass\DTOs\GuestUser;

/**
 * The first version's request: Update some fields of a guest account by username, from a DTOs\GuestUser carrying its username.
 *
 * @deprecated Use Identities\GuestUser\UpdateGuestUserByUsernameRequest (or ClearPass::identities()->guestUsers()).
 */
class UpdateGuestUserByUsernameRequest extends \spkm\ClearPass\Requests\Identities\GuestUser\UpdateGuestUserByUsernameRequest
{
    /**
     * @param  array<string, mixed>  $queryParameters
     */
    public function __construct(GuestUser|JsonSerializable $guestUser, array $queryParameters = [])
    {
        parent::__construct(CompatibleRequest::usernameOf($guestUser), $guestUser, $queryParameters);
    }
}
