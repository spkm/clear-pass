<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use spkm\ClearPass\Data\Data;

/**
 * A HPERules record.
 */
readonly class HPERules extends Data
{
    public function __construct(
        /** Number (1-2147483647). */
        public ?int $number = null,
        /** Packet Match. One of: match, ignore. */
        public ?string $packet_match = null,
        /** Traffic Match Type. One of: netsource, protocol. */
        public ?string $traffic_match_type = null,
        /** Destnation for protocol traffic_match_type. One of: any, host, ipsubnet. */
        public ?string $destination = null,
        /** Destination Port for protocol traffic_match_type. One of: eq, gt, lt, neg, range. */
        public ?string $destination_port = null,
        /** Destination Port Value for protocol traffic_match_type. */
        public ?string $destination_port_value = null,
        /** Destination Value for protocol traffic_match_type. */
        public ?string $destination_value = null,
        /** Established for tcp protocol. */
        public ?bool $established = null,
        /** Fin for tcp protocol. */
        public ?bool $fin = null,
        /** IP DSCP (0-63) for protocol traffic_match_type. */
        public ?int $ip_dscp = null,
        /** IP Precedence for protocol traffic_match_type. One of: routine, priority, immediate, flash, flash override, critical, internet, network. */
        public ?string $ip_precedence = null,
        /** IP Type of Service for protocol traffic_match_type. One of: normal, max reliability, max throughput, minimize delay. */
        public ?string $ip_service_type = null,
        /** Net Destination for netsource traffic_match_type. */
        public ?string $net_destination = null,
        /** Net Service for netsource traffic_match_type. */
        public ?string $net_service = null,
        /** Net Source for netsource traffic_match_type. One of: any. */
        public ?string $net_source = null,
        /** Protocol for protocol traffic_match_type. One of: tcp, udp, sctp, vrrp, pim, ospf, ipv6_in_ip, ip_in_ip, ip, ipv6, igmp, icmp, gre, esp, ah, 255. */
        public ?string $protocol = null,
        /** Protocol Number (0-255) for 255 protocol. */
        public ?int $protocol_number = null,
        /** Rst for tcp protocol. */
        public ?bool $rst = null,
        /** Source for protocol traffic_match_type. One of: any. */
        public ?string $source = null,
        /** Source Port for protocol traffic_match_type. One of: eq, gt, lt, neg, range. */
        public ?string $source_port = null,
        /** Source Port Value for protocol traffic_match_type. */
        public ?string $source_port_value = null,
        /** Syn for tcp protocol. */
        public ?bool $syn = null,
        /** VLAN ID (1-4094) for protocol traffic_match_type. */
        public ?int $vlan_id = null,
    ) {}
}
