<?php

namespace spkm\ClearPass\Data\GlobalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A SnmpTrapReceiver record.
 */
readonly class SnmpTrapReceiver extends Data
{
    /**
     * @param  array<string, mixed>|null  $auth_protocol
     * @param  array<string, mixed>|null  $priv_protocol
     * @param  array<string, mixed>|null  $security_level
     */
    public function __construct(
        /** Numeric ID of the SNMP Trap Server. */
        public ?int $id = null,
        /** HostName of the SNMP Trap Server. */
        public ?string $host_address = null,
        /** SNMP Version of the SNMP Trap Server. */
        public ?string $snmp_version = null,
        /** Server Port of the SNMP Trap Server. */
        public ?string $server_port = null,
        /** Authentication key of the SNMP Trap Server. */
        public ?string $auth_key = null,
        /** Authentication Protocol. One of: MD5, SHA. */
        public ?array $auth_protocol = null,
        /** Community String of the SNMP Trap Server. */
        public ?string $community_string = null,
        /** Description of the SNMP Trap Server. */
        public ?string $description = null,
        /** Privacy key of the SNMP Trap Server. */
        public ?string $priv_key = null,
        /** Privacy Protocol. One of: DES_CBC, AES_128, AES_192, AES_256. */
        public ?array $priv_protocol = null,
        /** SNMP Version. One of: NOAUTH_NOPRIV, AUTH_NOPRIV, AUTH_PRIV. */
        public ?array $security_level = null,
        /** Type of SNMP Trap Server. One of: Inform, Trap. */
        public ?string $type = null,
        /** Username of the SNMP Trap Server. */
        public ?string $user = null,
    ) {}
}
