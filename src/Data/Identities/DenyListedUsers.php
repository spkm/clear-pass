<?php

namespace spkm\ClearPass\Data\Identities;

use Carbon\CarbonImmutable;
use spkm\ClearPass\Data\Data;

/**
 * A DenyListedUsers record.
 */
readonly class DenyListedUsers extends Data
{
    public function __construct(
        /** Numeric ID of the deny listed user. */
        public ?int $id = null,
        /** Username of the deny listed user. */
        public ?string $user_id = null,
        /** Mac Address of the deny listed user. */
        public ?string $mac_address = null,
        /** Authentication Source. */
        public ?string $auth_source = null,
        /** Is Bandwidth limit exceeded. */
        public ?bool $bandwidth_limit_exceeded = null,
        /** Is Session duration exceeded. */
        public ?bool $session_duration_exceeded = null,
        /** Timestamp. */
        public ?CarbonImmutable $timestamp = null,
    ) {}
}
