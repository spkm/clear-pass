<?php

namespace spkm\ClearPass\Data\EndpointVisibility;

use spkm\ClearPass\Data\Data;

/**
 * A OnGuardZoneMapping record.
 */
readonly class OnGuardZoneMapping extends Data
{
    public function __construct(
        /** Numeric id of Policy Manager Zone. */
        public ?int $policy_manager_zone_id = null,
        /** Name of the Policy Manager Zone. */
        public ?string $policy_manager_zone_name = null,
        /** client subnet addresses specific to the Policy Manager zone. */
        public ?string $client_subnets = null,
        /** IP addresses or FQDN to which OnGuard agent will send request. This will override the Default ClearPass Server IPs. */
        public ?string $override_server_ips = null,
    ) {}
}
