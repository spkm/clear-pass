<?php

namespace spkm\ClearPass\Data\Identities;

use spkm\ClearPass\Data\Data;

/**
 * A LocalUser record.
 */
readonly class LocalUser extends Data
{
    /**
     * @param  array<string, mixed>|null  $attributes
     */
    public function __construct(
        /** Numeric ID of the local user. */
        public ?int $id = null,
        /** Unique user id of the local user. */
        public ?string $user_id = null,
        /** User name of the local user. */
        public ?string $username = null,
        /** Role name of the local user. */
        public ?string $role_name = null,
        /** Flag indicating if the account is enabled. */
        public ?bool $enabled = null,
        /** Flag indicating if the password change is required in next login. */
        public ?bool $change_pwd_next_login = null,
        /** Additional attributes(key/value pairs) may be stored with the local user account. */
        public ?array $attributes = null,
        /** Password of the local user. */
        public ?string $password = null,
    ) {}
}
