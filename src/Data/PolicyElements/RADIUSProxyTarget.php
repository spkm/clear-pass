<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A RADIUSProxyTarget record.
 */
readonly class RADIUSProxyTarget extends Data
{
    public function __construct(
        /** Numeric ID of the proxy target. */
        public ?int $id = null,
        /** Name of the proxy target. */
        public ?string $name = null,
        /** Host name of the proxy target. */
        public ?string $host_name = null,
        /** The proxy type, either RADIUS or RadSec. */
        public ?string $proxy_type = null,
        /** Accounting port of the proxy target. */
        public ?int $accounting_port = null,
        /** Authentication port of the proxy target. */
        public ?int $authentication_port = null,
        /** Client Certificate Subject. */
        public ?string $cert_subject = null,
        /** Description of the proxy target. */
        public ?string $description = null,
        /** Enable to send the status-server message. */
        public ?bool $enable_status_server_msgs = null,
        /** The RadSec proxy port number (Should be 2083). */
        public ?int $radsec_port = null,
        /** Enable to verify the server certificate. */
        public ?bool $radsec_verify_cert = null,
        /** Shared Secret of the proxy target. */
        public ?string $secret = null,
    ) {}
}
