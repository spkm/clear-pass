<?php

namespace spkm\ClearPass\Data\GlobalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A MessagingSetup record.
 */
readonly class MessagingSetup extends Data
{
    public function __construct(
        /** SMTP Server Name. */
        public ?string $server_name = null,
        /** Username. */
        public ?string $user_name = null,
        /** Default FROM Address. */
        public ?string $default_from_address = null,
        /** Connection Security. One of: ssl, startTLS, none. */
        public ?string $connection_security = null,
        /** Port Number. */
        public ?int $port = null,
        /** Connection Timeout. */
        public ?int $connection_timeout = null,
        /** Password. */
        public ?string $password = null,
    ) {}
}
