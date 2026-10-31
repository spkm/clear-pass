<?php

namespace spkm\ClearPass\Data\Integrations;

use spkm\ClearPass\Data\Data;

/**
 * A SyslogTarget record.
 */
readonly class SyslogTarget extends Data
{
    public function __construct(
        /** Numeric id of syslog target. */
        public ?int $id = null,
        /** Description of syslog target. */
        public ?string $description = null,
        /** Server host address of syslog target. */
        public ?string $host_address = null,
        /** Protocol used for syslog target. One of: UDP, TCP. */
        public ?string $protocol = null,
        /** Server port of syslog target. */
        public ?int $server_port = null,
    ) {}
}
