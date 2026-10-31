<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A NetworkDevice record.
 */
readonly class NetworkDevice extends Data
{
    /**
     * @param  array<string, mixed>|null  $attributes
     * @param  array<int, string>|null  $nad_groups
     */
    public function __construct(
        /** Numeric ID of the network device. */
        public ?int $id = null,
        /** Name of the network device. */
        public ?string $name = null,
        /** Description of the network device. */
        public ?string $description = null,
        /** IP or Subnet Address of the network device. */
        public ?string $ip_address = null,
        /** RADIUS Shared Secret of the network device. */
        public ?string $radius_secret = null,
        /** TACACS+ Shared Secret of the network device. */
        public ?string $tacacs_secret = null,
        /** Vendor Name of the network device. */
        public ?string $vendor_name = null,
        /** Vendor Id of the network device. */
        public ?int $vendor_id = null,
        /** Flag indicating if the network device is capable of CoA. */
        public ?bool $coa_capable = null,
        /** CoA port number of the network device. */
        public ?int $coa_port = null,
        /** Flag indicating if the network device is radSec enabled. */
        public ?bool $radsec_enabled = null,
        /** Additional attributes(key/value pairs) may be stored with the network device. */
        public ?array $attributes = null,
        /** CLI Configuration details of the network device. */
        public ?CLISettings $cli_config = null,
        /** NAD groups. */
        public ?array $nad_groups = null,
        /** OnConnect Enforcement settings of the network device. */
        public ?OnConnectEnforcementSettings $onConnect_enforcement = null,
        /** RadSec settings of the network device. */
        public ?RadSecSettings $radsec_config = null,
        /** SNMP read settings of the network device. */
        public ?SNMPReadSettings $snmp_read = null,
        /** SNMP write settings of the network device. */
        public ?SNMPWriteSettings $snmp_write = null,
    ) {}
}
