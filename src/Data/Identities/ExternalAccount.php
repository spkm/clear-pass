<?php

namespace spkm\ClearPass\Data\Identities;

use spkm\ClearPass\Data\Data;

/**
 * A ExternalAccount record.
 */
readonly class ExternalAccount extends Data
{
    public function __construct(
        /** Numeric ID of the external account. */
        public ?int $id = null,
        /** Name of the external account. */
        public ?string $name = null,
        /** Type of the external account. One of: SSH, Domain, SNMP. */
        public ?string $type = null,
        /** Description of the external account. */
        public ?string $description = null,
        /** Authorization key for V3 SNMP external account. */
        public ?string $auth_key = null,
        /** Authorization protocol for V3 SNMP external account. One of: MD5, SHA. */
        public ?string $auth_protocol = null,
        /** Community string for V1 and V2C SNMP external account. */
        public ?string $community = null,
        /** Domain for WMI external account. */
        public ?string $domain = null,
        /** Enable-password for SSH external account. */
        public ?string $enable_password = null,
        /** Password for the external account. */
        public ?string $password = null,
        /** Privacy key for V3 SNMP external account. */
        public ?string $priv_key = null,
        /** Privacy protocol for V3 SNMP external account. One of: DES_CBC, AES_128, AES_192, AES_256. */
        public ?string $priv_protocol = null,
        /** Security level for V3 SNMP external account. One of: NOAUTH_NOPRIV, AUTH_NOPRIV, AUTH_PRIV. */
        public ?string $security_level = null,
        /** SNMP Version for SNMP external account. One of: V1, V2C, V3. */
        public ?string $snmp_version = null,
        /** User name for the external account. */
        public ?string $username = null,
    ) {}
}
