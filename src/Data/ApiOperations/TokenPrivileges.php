<?php

namespace spkm\ClearPass\Data\ApiOperations;

use spkm\ClearPass\Data\Data;

/**
 * A TokenPrivileges record.
 */
readonly class TokenPrivileges extends Data
{
    /**
     * @param  array<int, string>|null  $privileges
     */
    public function __construct(
        /** List of privileges available to the user. */
        public ?array $privileges = null,
    ) {}
}
