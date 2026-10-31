<?php

namespace spkm\ClearPass\Data\LocalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A ADDomain record.
 */
readonly class ADDomain extends Data
{
    /**
     * @param  array<string, mixed>|null  $password_servers
     */
    public function __construct(
        /** FQDN of the domain controller. */
        public ?string $domain_controller = null,
        /** NetBIOS name of the domain. */
        public ?string $netbios_name = null,
        /** List of Hostname or IP Address of the AD password servers. */
        public ?array $password_servers = null,
        /** Leave domain even if AD is down. */
        public ?bool $force_leave = null,
        /** Action to perform in case of a controller name conflict(1 - Use specified Domain Controller, 2 - Use Domain Controller returned by DNS query, 3 - Fail on conflict). */
        public ?int $on_name_conflict = null,
        /** Domain password. */
        public ?string $password = null,
        /** Status of AD domain join/leave operation. One of: SUCCESS, RUNNING. */
        public ?string $status = null,
        /** Response message of AD domain join/leave operation. */
        public ?string $status_message = null,
        /** Domain username. */
        public ?string $username = null,
    ) {}
}
