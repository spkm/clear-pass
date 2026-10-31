<?php

namespace spkm\ClearPass\Data\LocalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A AccessControl record.
 */
readonly class AccessControl extends Data
{
    /**
     * @param  array<string, mixed>|null  $networks
     */
    public function __construct(
        /** Access type of the Access control application. One of: Allow, Deny. */
        public ?string $access = null,
        /** hostname, IP address or subnet (CIDR) of the Networks to be restricted (e.g. ["hostname.example.com", "1.2.3.4", "10.1.0.0/16"]). */
        public ?array $networks = null,
    ) {}
}
