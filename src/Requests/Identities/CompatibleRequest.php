<?php

namespace spkm\ClearPass\Requests\Identities;

use InvalidArgumentException;
use JsonSerializable;
use spkm\ClearPass\Data\Identities\GuestUser as GuestUserModel;
use spkm\ClearPass\DTOs\GuestUser;

/**
 * What the first version's guest account requests took: a DTOs\GuestUser (or the model) carrying the account's id
 * or username.
 *
 * @internal
 */
final class CompatibleRequest
{
    public static function idOf(GuestUser|GuestUserModel|JsonSerializable $guestUser): int
    {
        $id = $guestUser instanceof GuestUser || $guestUser instanceof GuestUserModel ? $guestUser->id : null;

        if ($id === null) {
            throw new InvalidArgumentException('Guest User ID is required');
        }

        return $id;
    }

    public static function usernameOf(GuestUser|GuestUserModel|JsonSerializable $guestUser): string
    {
        $username = $guestUser instanceof GuestUser || $guestUser instanceof GuestUserModel ? $guestUser->username : null;

        if ($username === null || $username === '') {
            throw new InvalidArgumentException('Guest User Username is required');
        }

        return $username;
    }
}
