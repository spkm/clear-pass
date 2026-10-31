<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use spkm\ClearPass\Data\Data;

/**
 * A SessionAccessControlListRules record.
 */
readonly class SessionAccessControlListRules extends Data
{
    public function __construct(
        /** Source Traffic Match. One of: alias, any, host, network, user. */
        public ?string $src_traffic_match = null,
        /** Destination Traffic Match. One of: alias, any, host, network, user. */
        public ?string $dst_traffic_match = null,
        /** Service Type. One of: any, protocol, service, tcp, udp. */
        public ?string $service_type = null,
        /** Action. One of: deny, dst-nat, dual-nat, permit, redirect, src-nat. */
        public ?string $action = null,
        /** Deny List User if ACL gets applied. One of: Yes, No. */
        public ?string $deny_list_user_if_acl_applied = null,
        /** Log if ACL gets applied. One of: Yes, No. */
        public ?string $log_if_acl_applied = null,
        /** Mirror. One of: Yes, No. */
        public ?string $mirror = null,
        /** 802.1p Priority (0-7). */
        public ?int $dot1p_priority = null,
        /** Destination Alias. */
        public ?string $dst_alias = null,
        /** Destination IP Address. */
        public ?string $dst_ip_address = null,
        /** Destination NAT IP Address. */
        public ?string $dst_nat_ip_address = null,
        /** Destination NAT Port (0-65535). */
        public ?int $dst_nat_port = null,
        /** Destination Net Mask. */
        public ?string $dst_netmask = null,
        /** Dual NAT Pool. */
        public ?string $dual_nat_pool = null,
        /** Name of Network in FQDN format. */
        public ?string $network_name = null,
        /** Position (1-2000). */
        public ?int $position = null,
        /** Protocol Number (0-255). */
        public ?int $protocol_number = null,
        /** Queue Priority. One of: low, high. */
        public ?string $queue_priority = null,
        /** Service. */
        public ?string $service = null,
        /** Source Alias. */
        public ?string $src_alias = null,
        /** Source IP Address. */
        public ?string $src_ip_address = null,
        /** Source NAT Pool. */
        public ?string $src_nat_pool = null,
        /** Source Net Mask. */
        public ?string $src_netmask = null,
        /** TCP Max Port (0-65535). */
        public ?int $tcp_max_port = null,
        /** TCP Min Port (0-65535). */
        public ?int $tcp_min_port = null,
        /** Time Range. */
        public ?string $time_range = null,
        /** TOS (0-63). */
        public ?int $tos = null,
        /** Tunnel ID (1-50). */
        public ?int $tunnel_id = null,
        /** UDP Max Port (0-65535). */
        public ?int $udp_max_port = null,
        /** UDP Min Port (0-65535). */
        public ?int $udp_min_port = null,
    ) {}
}
