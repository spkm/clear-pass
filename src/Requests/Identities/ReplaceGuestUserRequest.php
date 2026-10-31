<?php

namespace spkm\ClearPass\Requests\Identities;

use JsonSerializable;
use spkm\ClearPass\DTOs\GuestUser;

/**
 * The first version's request: Replace a guest account, from a DTOs\GuestUser carrying its id.
 *
 * @deprecated Use Identities\GuestUser\ReplaceGuestUserRequest (or ClearPass::identities()->guestUsers()).
 */
class ReplaceGuestUserRequest extends \spkm\ClearPass\Requests\Identities\GuestUser\ReplaceGuestUserRequest
{
    /**
     * @param  array<string, mixed>  $queryParameters
     */
    public function __construct(GuestUser|JsonSerializable $guestUser, array $queryParameters = [])
    {
        parent::__construct(CompatibleRequest::idOf($guestUser), $guestUser, $queryParameters);
    }
}
