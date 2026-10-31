<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use spkm\ClearPass\Data\Data;

/**
 * A NetService record.
 */
readonly class NetService extends Data
{
    public function __construct(
        /** Numeric ID of the Net Service. */
        public ?int $id = null,
        /** Name of the Net Service. */
        public ?string $name = null,
        /** Description of the Net Service. */
        public ?string $description = null,
        /** Protocol of the Net Service. One of: TCP, UDP, IP. */
        public ?string $protocol = null,
        /** Application Level Gateway of the Net Service. One of: dhcp, dns, ftp, noe, rtsp, sccp, sip, sips, svp, tftp, vocera. */
        public ?string $application_level_gateway = null,
        /** IP Protocol Number of the Net Service (0-255). */
        public ?int $ip_protocol_number = null,
        /** Max Port of the Net Service (1-65535). */
        public ?int $max_port = null,
        /** Port of the Net Service (1-65535). */
        public ?int $port = null,
        /** Comma separated Port values of the Net Service. */
        public ?string $port_list = null,
        /** Port Selection of the Net Service. Port is not applicable for MAS and AMC products. One of: List, Range, Port. */
        public ?string $port_selection = null,
    ) {}
}
