<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use spkm\ClearPass\Data\Data;

/**
 * A AosCxRules record.
 */
readonly class AosCxRules extends Data
{
    public function __construct(
        /** Packet Match. One of: match, ignore. */
        public ?string $packet_match = null,
        /** Protocol. One of: tcp, udp, sctp, pim, ospf, ip, ipv6, igmp, icmp, icmpv6, gre, esp, ah, number, any. */
        public ?string $protocol = null,
        /** Source. One of: any, ip. */
        public ?string $source = null,
        /** Destination. One of: any, ip. */
        public ?string $destination = null,
        /** ack for tcp protocol. */
        public ?bool $ack = null,
        /** Count Packet. */
        public ?bool $count_packet = null,
        /** cwr for tcp protocol. */
        public ?bool $cwr = null,
        /** Destination IP Address for ip destination. */
        public ?string $destination_ip_address = null,
        /** Destination Port. One of: eq, gt, lt, range. */
        public ?string $destination_port = null,
        /** Destination Port Value. */
        public ?string $destination_port_value = null,
        /** DSCP (0-63). */
        public ?int $dscp = null,
        /** ece for tcp protocol. */
        public ?bool $ece = null,
        /** ECN (0-3). */
        public ?int $ecn = null,
        /** established for tcp protocol. */
        public ?bool $established = null,
        /** fin for tcp protocol. */
        public ?bool $fin = null,
        /** Fragment. */
        public ?bool $fragment = null,
        /** ICMP Code (0-255) for icmp protocol. */
        public ?int $icmp_code = null,
        /** ICMP Type for icmp protocol. One of: echo, echo-reply, number. */
        public ?string $icmp_type = null,
        /** ICMP Type Value (0-255) for number icmp_type. */
        public ?int $icmp_type_value = null,
        /** IP Precedence. One of: routine, priority, immediate, flash, flash override, critical, internet, network. */
        public ?string $ip_precedence = null,
        /** Number (1-2147483647). */
        public ?int $number = null,
        /** Protocol Number for number protocol. */
        public ?int $protocol_number = null,
        /** psh for tcp protocol. */
        public ?bool $psh = null,
        /** rst for tcp protocol. */
        public ?bool $rst = null,
        /** Type of Service (0-31). */
        public ?int $service_type = null,
        /** Source IP Address for ip source. */
        public ?string $source_ip_address = null,
        /** Source Port. One of: eq, gt, lt, range. */
        public ?string $source_port = null,
        /** Source Port Value. */
        public ?string $source_port_value = null,
        /** syn for tcp protocol. */
        public ?bool $syn = null,
        /** Time to Live (0-255). */
        public ?int $ttl = null,
        /** urg for tcp protocol. */
        public ?bool $urg = null,
        /** VLAN ID (1-4094). */
        public ?int $vlan_id = null,
    ) {}
}
