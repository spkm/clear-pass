<?php

namespace spkm\ClearPass\Data\EndpointVisibility;

use spkm\ClearPass\Data\Data;

/**
 * A ProfilerSubnetMapping record.
 */
readonly class ProfilerSubnetMapping extends Data
{
    /**
     * @param  array<int, string>|null  $ext_accounts
     */
    public function __construct(
        /** Numeric ID of Profiler Subnet Mapping. */
        public ?int $id = null,
        /** IP Subnets/IP Addresses in CSV format (e.g. "10.21.11.0/24,12.12.12.12"). */
        public ?string $network = null,
        /** Scan type of Profiler Subnet Mapping. One of: WMI, SSH, SNMP. */
        public ?string $scan_type = null,
        /** List of external account names according to Scan Type (e.g. ["acc-wmi-1", "acc-wmi-2", "acc-wmi-3"] for Scan Type WMI). */
        public ?array $ext_accounts = null,
    ) {}
}
