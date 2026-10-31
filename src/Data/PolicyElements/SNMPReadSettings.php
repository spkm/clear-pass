<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A SNMPReadSettings record.
 */
readonly class SNMPReadSettings extends Data
{
    public function __construct(
        /** Authentication key of the network device. */
        public ?string $auth_key = null,
        /** Authentication protocol of the network device. One of: MD5, SHA. */
        public ?string $auth_protocol = null,
        /** Community string of the network device. */
        public ?string $community_string = null,
        /** This field is deprecated. */
        public ?bool $force_read = null,
        /** Privacy key of the network device. */
        public ?string $privacy_key = null,
        /** Privacy protocol of the network device. One of: DES_CBC, AES_128. */
        public ?string $privacy_protocol = null,
        /** Enable to read ARP table from this device. */
        public ?bool $read_arp_info = null,
        /** Security level of the network device. One of: NOAUTH_NOPRIV, AUTH_NOPRIV, AUTH_PRIV. */
        public ?string $security_level = null,
        /** SNMP version of the network device. One of: V1, V2C, V3. */
        public ?string $snmp_version = null,
        /** Username of the network device. */
        public ?string $user = null,
        /** Policy Manager Zone name to be associated with the network device. */
        public ?string $zone_name = null,
    ) {}
}
