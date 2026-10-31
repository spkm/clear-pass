<?php

namespace spkm\ClearPass\Data\GlobalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A AdminUserPasswordPolicy record.
 */
readonly class AdminUserPasswordPolicy extends Data
{
    public function __construct(
        /** Minimum length of the password. One of: 6-128. */
        public ?int $password_minimum_length = null,
        /** Complexity Level of the password. One of: NONE, CASE, NUMBER, ALPHANUMERIC, CASENUMERIC, PUNCTUATION, COMPLEX. */
        public ?string $password_complexity = null,
        /** Disallowed characters in the password. */
        public ?string $password_disallowed_characters = null,
        /** Disallowed words in the password. */
        public ?string $password_disallowed_words = null,
        /** May not contain User ID or its characters in reversed order. */
        public ?bool $password_prohibit_user_id = null,
        /** May not contain repeated character four or more times consecutively. */
        public ?bool $password_prohibit_repeated_chars = null,
        /** Password expiry days. One of: 0-500. */
        public ?int $password_expiry_days = null,
        /** Failed attempts count. One of: 1-100. */
        public ?int $disable_after_failed_attempts = null,
        /** Must be different from this many previous passwords. One of: 1-99. */
        public ?int $password_remember_history = null,
        /** Reset failed attempts count and enable those users. */
        public ?bool $reset_failed_attempts_count = null,
    ) {}
}
