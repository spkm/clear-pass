<?php

namespace spkm\ClearPass\Data\GlobalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A AdminUser record.
 */
readonly class AdminUser extends Data
{
    public function __construct(
        /** Numeric ID of the admin user. */
        public ?int $id = null,
        /** Name of the admin user. */
        public ?string $name = null,
        /** Unique user id of the admin user. */
        public ?string $user_id = null,
        /** Flag indicating if the account is enabled. */
        public ?bool $enabled = null,
        /** Name of the admin privilege. */
        public ?string $privilege_level = null,
        /** Password of the admin user. */
        public ?string $password = null,
    ) {}
}
