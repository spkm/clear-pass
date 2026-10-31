<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use spkm\ClearPass\Data\Data;

/**
 * A StatelessAccessControlListRules record.
 */
readonly class StatelessAccessControlListRules extends Data
{
    public function __construct(
        /** Source Traffic Match. */
        public ?string $src_traffic_match = null,
        /** Destination Traffic Match. */
        public ?string $dst_traffic_match = null,
        /** Service Type. */
        public ?string $service_type = null,
        /** Action. */
        public ?string $action = null,
        /** Deny List User if ACL gets applied. */
        public ?string $deny_list_user_if_acl_applied = null,
        /** Log if ACL gets applied. */
        public ?string $log_if_acl_applied = null,
        /** Destination Alias. */
        public ?string $dst_alias = null,
        /** Destination IP Address. */
        public ?string $dst_ip_address = null,
        /** Destination Net Mask. */
        public ?string $dst_netmask = null,
        /** Redirect based on IPsec Map. */
        public ?string $ipsec_map_based_redirect = null,
        /** Policer Profile. */
        public ?string $policer_profile = null,
        /** Position. */
        public ?int $position = null,
        /** Protocol Number. */
        public ?int $protocol_number = null,
        /** QoS Profile. */
        public ?string $qos_profile = null,
        /** Redirect Type. */
        public ?string $redirect_type = null,
        /** Service. */
        public ?string $service = null,
        /** Source Alias. */
        public ?string $src_alias = null,
        /** Source IP Address. */
        public ?string $src_ip_address = null,
        /** Source Net Mask. */
        public ?string $src_netmask = null,
        /** TCP Max Port. */
        public ?int $tcp_max_port = null,
        /** TCP Min Port. */
        public ?int $tcp_min_port = null,
        /** Time Range. */
        public ?string $time_range = null,
        /** Tunnel ID. */
        public ?int $tunnel_id = null,
        /** UDP Max Port. */
        public ?int $udp_max_port = null,
        /** UDP Min Port. */
        public ?int $udp_min_port = null,
    ) {}
}
