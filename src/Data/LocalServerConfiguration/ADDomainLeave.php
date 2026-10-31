<?php

namespace spkm\ClearPass\Data\LocalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A ADDomainLeave record.
 */
readonly class ADDomainLeave extends Data
{
    public function __construct(
        /** NetBIOS name of the domain. */
        public ?string $netbios_name = null,
        /** Domain username. */
        public ?string $username = null,
        /** Domain password. */
        public ?string $password = null,
        /** Leave domain even if AD is down. */
        public ?bool $force_leave = null,
    ) {}
}
