<?php

namespace spkm\ClearPass\Requests\Identities;

use JsonSerializable;
use spkm\ClearPass\DTOs\GuestUser;

/**
 * The first version's request: Replace a guest account by username, from a DTOs\GuestUser carrying its username.
 *
 * @deprecated Use Identities\GuestUser\ReplaceGuestUserByUsernameRequest (or ClearPass::identities()->guestUsers()).
 */
class ReplaceGuestUserByUsernameRequest extends \spkm\ClearPass\Requests\Identities\GuestUser\ReplaceGuestUserByUsernameRequest
{
    /**
     * @param  array<string, mixed>  $queryParameters
     */
    public function __construct(GuestUser|JsonSerializable $guestUser, array $queryParameters = [])
    {
        parent::__construct(CompatibleRequest::usernameOf($guestUser), $guestUser, $queryParameters);
    }
}
