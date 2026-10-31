<?php

namespace spkm\ClearPass\Requests\Identities;

use JsonSerializable;
use spkm\ClearPass\DTOs\GuestUser;

/**
 * The first version's request to create a guest account from a DTOs\GuestUser.
 *
 * @deprecated Use Identities\GuestUser\CreateGuestUserRequest (or ClearPass::identities()->guestUsers()).
 */
class CreateGuestUserRequest extends \spkm\ClearPass\Requests\Identities\GuestUser\CreateGuestUserRequest
{
    /**
     * @param  GuestUser|JsonSerializable|array<string, mixed>  $guestUser
     * @param  array<string, mixed>  $queryParameters
     */
    public function __construct(GuestUser|JsonSerializable|array $guestUser, array $queryParameters = [])
    {
        parent::__construct($guestUser, $queryParameters);
    }
}
