<?php

namespace spkm\ClearPass\Requests\Identities;

use JsonSerializable;
use spkm\ClearPass\DTOs\GuestUser;

/**
 * The first version's request: Update some fields of a guest account, from a DTOs\GuestUser carrying its id.
 *
 * @deprecated Use Identities\GuestUser\UpdateGuestUserRequest (or ClearPass::identities()->guestUsers()).
 */
class UpdateGuestUserRequest extends \spkm\ClearPass\Requests\Identities\GuestUser\UpdateGuestUserRequest
{
    /**
     * @param  array<string, mixed>  $queryParameters
     */
    public function __construct(GuestUser|JsonSerializable $guestUser, array $queryParameters = [])
    {
        parent::__construct(CompatibleRequest::idOf($guestUser), $guestUser, $queryParameters);
    }
}
