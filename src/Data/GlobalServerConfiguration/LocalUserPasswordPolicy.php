<?php

namespace spkm\ClearPass\Data\GlobalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A LocalUserPasswordPolicy record.
 */
readonly class LocalUserPasswordPolicy extends Data
{
    public function __construct(
        /** Minimum length of the password. One of: 1-128. */
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
        /** Disable after Date Exceeds. One of: yyyy-mm-dd. */
        public ?string $disable_after_date = null,
        /** Disable after Days Exceed. One of: 1-1000. */
        public ?int $disable_after_days = null,
        /** Failed attempts count. One of: 1-100. */
        public ?int $disable_after_failed_attempts = null,
        /** Disable after password not changed after this many days. One of: 1-365. */
        public ?int $disable_after_unchanged_days = null,
        /** Must be different from this many previous passwords. One of: 1-99. */
        public ?int $password_remember_history = null,
        /** Display reminder message after this many days. One of: 1-365. */
        public ?int $reminder_days = null,
        /** Reminder message to be displayed. */
        public ?string $reminder_message = null,
        /** Reset failed attempts count and enable those users. */
        public ?bool $reset_failed_attempts_count = null,
    ) {}
}
