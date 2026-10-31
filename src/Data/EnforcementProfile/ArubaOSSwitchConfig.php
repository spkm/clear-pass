<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use spkm\ClearPass\Data\Data;

/**
 * A ArubaOSSwitchConfig record.
 */
readonly class ArubaOSSwitchConfig extends Data
{
    public function __construct(
        /** Cached Re-Authentication Period. */
        public ?string $cached_reauth_period = null,
        /** Captive Portal Profile name. */
        public ?string $captive_portal_profile_name = null,
        /** Controller Downloadable Role. */
        public ?string $controller_downloadable_role = null,
        /** Controller Static Role. */
        public ?string $controller_static_role = null,
        /** Enable Admin Edge Port. */
        public ?bool $enable_admin_edge_port = null,
        /** Enable Device Configuration. */
        public ?bool $enable_device_config = null,
        /** Enable POE Allocate By Class. */
        public ?bool $enable_poe_allocate_by_class = null,
        /** Enable Port Mode. */
        public ?bool $enable_port_mode = null,
        /** Logoff Period. */
        public ?string $logoff_period = null,
        /** POE Priority. One of: low, high, critical. */
        public ?string $poe_priority = null,
        /** Policy name. */
        public ?string $policy_name = null,
        /** Re-Authentication Period. */
        public ?string $reauth_period = null,
        /** VLAN ID. */
        public ?string $vlan_id = null,
        /** VLAN Name. */
        public ?string $vlan_name = null,
        /** VLAN ID Tagged. */
        public ?string $vlan_tagged_id = null,
        /** VLAN Name Tagged. */
        public ?string $vlan_tagged_name = null,
    ) {}
}
