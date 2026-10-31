<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use spkm\ClearPass\Data\Data;

/**
 * A AOSCXConfig record.
 */
readonly class AOSCXConfig extends Data
{
    public function __construct(
        /** Access VLAN. */
        public ?string $access_vlan_id = null,
        /** Access VLAN Name. */
        public ?string $access_vlan_name = null,
        /** Access VLAN Type. One of: Id, Name, Parameterized. */
        public ?string $access_vlan_type = null,
        /** Allowed VLANs on Trunk. */
        public ?string $allowed_vlan_ids_trunk = null,
        /** List of Allowed VLAN Names on Trunk. */
        public ?string $allowed_vlan_names_trunk = null,
        /** Authentication Mode. One of: , client-mode, device-mode, multi-domain-mode. */
        public ?string $authentication_mode = null,
        /** Cached Re-authentication period. */
        public ?string $cached_reauth_period = null,
        /** Captive Portal name. */
        public ?string $captive_portal_name = null,
        /** Client Inactivity Timeout value. */
        public ?string $client_inactivity_timeout = null,
        /** Client Inactivity Timeout Type. One of: Value, None, Parameterized. */
        public ?string $client_inactivity_timeout_type = null,
        /** Description. */
        public ?string $description = null,
        /** Device Traffic Class. One of: None, Voice. */
        public ?string $device_traffic_class = null,
        /** Gateway Downloadable Role. */
        public ?string $gateway_downloadable_role = null,
        /** Gateway Static Role. */
        public ?string $gateway_static_role = null,
        /** Gateway Zone. */
        public ?string $gateway_zone = null,
        /** Minimum re-authentication period. */
        public ?string $minimum_reauth_period = null,
        /** MTU. */
        public ?string $mtu = null,
        /** Native Trunk VLAN. */
        public ?string $native_trunk_vlan_id = null,
        /** Native Trunk VLAN Name. */
        public ?string $native_trunk_vlan_name = null,
        /** Native Trunk VLAN Type. One of: Id, Name, Parameterized. */
        public ?string $native_trunk_vlan_type = null,
        /** Parameterized Access VLAN. */
        public ?string $parameterized_access_vlan = null,
        /** Parameterized Allowed VLAN. */
        public ?string $parameterized_allowed_vlan = null,
        /** Parameterized Allowed VLAN Type. One of: Id, Name. */
        public ?string $parameterized_allowed_vlan_type = null,
        /** Parameterized Client Inactivity Timeout. */
        public ?string $parameterized_client_inactivity_timeout = null,
        /** Parameterized Native Trunk VLAN. */
        public ?string $parameterized_native_trunk_vlan = null,
        /** Parameterized Re-Authentication. */
        public ?string $parameterized_reauth = null,
        /** Parameterized Session Timeout. */
        public ?string $parameterized_session_timeout = null,
        /** PoE Priority. One of: , low, high, critical. */
        public ?string $poe_priority = null,
        /** Policy name. */
        public ?string $policy_name = null,
        /** Private VLAN Port Type. One of: , promiscuous, secondary. */
        public ?string $private_vlan_port_type = null,
        /** Re-Authentication Period. */
        public ?string $reauth_period = null,
        /** Re-Authentication Period Type. One of: Manual, Random, Parameterized. */
        public ?string $reauth_period_type = null,
        /** Role name. */
        public ?string $role_name = null,
        /** Secondary Role Type. One of: None, Static, Dynamic. */
        public ?string $secondary_role_type = null,
        /** Session Timeout. */
        public ?string $session_timeout = null,
        /** Session Timeout Type. One of: Static, Parameterized. */
        public ?string $session_timeout_type = null,
        /** Trust Mode. One of: , none, cos, dscp. */
        public ?string $trust_mode = null,
    ) {}
}
