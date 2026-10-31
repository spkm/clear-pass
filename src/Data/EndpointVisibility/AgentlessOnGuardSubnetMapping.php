<?php

namespace spkm\ClearPass\Data\EndpointVisibility;

use spkm\ClearPass\Data\Data;

/**
 * A AgentlessOnGuardSubnetMapping record.
 */
readonly class AgentlessOnGuardSubnetMapping extends Data
{
    /**
     * @param  array<int, string>|null  $client_subnets
     */
    public function __construct(
        /** Numeric ID of Agentless OnGuard Subnet Mapping. */
        public ?int $id = null,
        /** Name of Agentless OnGuard Subnet Mapping. */
        public ?string $name = null,
        /** IP subnets used for selecting clients. */
        public ?array $client_subnets = null,
        /** Name of Policy Manager Zone for which the specified client subnet is applicable. */
        public ?string $zone = null,
        /** Clients to be scanned in the subnet. One of: AllClients, StaticIPClients. */
        public ?string $client_scan_setting = null,
        /** Enable Clearpass server to process clients in the subnet and run Agentless OnGuard (default=true). */
        public ?bool $enabled = null,
        /** Name of Agentless OnGuard setting for Linux for the specified subnet and zone. To unset, use empty string. */
        public ?string $agentless_onguard_setting_linux = null,
        /** Name of Agentless OnGuard setting for macOS for the specified subnet and zone. To unset, use empty string. */
        public ?string $agentless_onguard_setting_macOS = null,
        /** Name of Agentless OnGuard setting for Windows for the specified subnet and zone. To unset, use empty string. */
        public ?string $agentless_onguard_setting_windows = null,
    ) {}
}
