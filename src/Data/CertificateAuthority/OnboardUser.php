<?php

namespace spkm\ClearPass\Data\CertificateAuthority;

use spkm\ClearPass\Data\Data;

/**
 * A OnboardUser record.
 */
readonly class OnboardUser extends Data
{
    public function __construct(
        /** Number of devices enrolled by this user. */
        public ?string $device_count = null,
        /** Numeric ID of the user. */
        public ?int $id = null,
        /** Determines whether the user can enroll devices. One of: allowed, denied. */
        public ?string $status = null,
        /** Username of the user. */
        public ?string $username = null,
    ) {}
}
