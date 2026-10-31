<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A OnConnectEnforcementSettings record.
 */
readonly class OnConnectEnforcementSettings extends Data
{
    public function __construct(
        /** Flag indicating if the network device is enabled with OnConnect Enforcement. SNMP read configuration and Policy Manager Zone is a must for this to work. */
        public ?bool $enabled = null,
        /** Port names used in OnConnect Enforcement in CSV format (e.g. FastEthernet 1/0/10). Use empty string to enable for all ports. Ports determined to be uplink or trunk ports will be ignored. */
        public ?string $ports = null,
    ) {}
}
