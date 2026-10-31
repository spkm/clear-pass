<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use spkm\ClearPass\Data\Data;

/**
 * A NetDestinationRules record.
 */
readonly class NetDestinationRules extends Data
{
    public function __construct(
        /** Rule Type. One of: host, network, name, range. */
        public ?string $rule_type = null,
        /** IP Address. */
        public ?string $ip_address = null,
        /** Netmask. */
        public ?string $netmask = null,
        /** End IP Address. */
        public ?string $end_ip_address = null,
        /** Host Name or Domain. */
        public ?string $host_name = null,
        /** Position (1-220) for ArubaOS-Switch Net Destination rule. */
        public ?int $position = null,
    ) {}
}
