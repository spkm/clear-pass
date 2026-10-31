<?php

namespace spkm\ClearPass\Data\LocalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A ServerSnmp record.
 */
readonly class ServerSnmp extends Data
{
    public function __construct(
        /** System location of the system monitoring settings for a server. */
        public ?string $system_location = null,
        /** Engine ID of system monitoring settings. */
        public ?string $engine_id = null,
        /** SNMP Version of the system monitoring settings. One of: V1, V2C, V3. */
        public ?string $version = null,
        /** Community String of the system monitoring settings. */
        public ?string $community_string = null,
        /** System contact of the system monitoring settings for a server. */
        public ?string $system_contact = null,
        /** Authentication key of system monitoring settings. */
        public ?string $auth_key = null,
        /** Authentication Protocol of system monitoring settings. One of: MD5, SHA. */
        public ?string $auth_protocol = null,
        /** Privacy key of system monitoring settings. */
        public ?string $privacy_key = null,
        /** Privacy Protocol of system monitoring settings. One of: DES, AES. */
        public ?string $privacy_protocol = null,
        /** Security Level of system monitoring settings. One of: NOAUTH_NOPRIV, AUTH_NOPRIV, AUTH_PRIV. */
        public ?string $security_level = null,
        /** Username for system monitoring settings. */
        public ?string $username = null,
    ) {}
}
