<?php

namespace spkm\ClearPass\Enums;

/*
 * do_expire: Integer that specifies the action to take when the expire time of the account is reached.
 * */
enum GuestUserExpirationAction: int
{
    case NONE = 0;             // No action, account does not expire
    case DISABLE = 1;          // Disable account upon expiration
    case DISABLE_AND_LOGOUT = 2; // Disable and log the user out
    case DELETE = 3;           // Delete account upon expiration
    case DELETE_AND_LOGOUT = 4; // Delete and log the user out
}
