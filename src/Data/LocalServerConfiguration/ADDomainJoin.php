<?php

namespace spkm\ClearPass\Data\LocalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A ADDomainJoin record.
 */
readonly class ADDomainJoin extends Data
{
    public function __construct(
        /** FQDN of the domain controller. */
        public ?string $domain_controller = null,
        /** NetBIOS name of the domain. */
        public ?string $netbios_name = null,
        /** Action to perform in case of a controller name conflict(1 - Use specified Domain Controller, 2 - Use Domain Controller returned by DNS query, 3 - Fail on conflict). */
        public ?int $on_name_conflict = null,
        /** Domain username. */
        public ?string $username = null,
        /** Domain password. */
        public ?string $password = null,
    ) {}
}
