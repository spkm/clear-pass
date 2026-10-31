<?php

namespace spkm\ClearPass\Enums;

/**
 * What ClearPass does to a guest account when its expire_time is reached: the do_expire field.
 */
enum GuestUserExpirationAction: int
{
    /** No action: the account does not expire. */
    case NONE = 0;

    /** Disable the account. */
    case DISABLE = 1;

    /** Disable the account and log the guest out. */
    case DISABLE_AND_LOGOUT = 2;

    /** Delete the account. */
    case DELETE = 3;

    /** Delete the account and log the guest out. */
    case DELETE_AND_LOGOUT = 4;
}
