<?php

namespace spkm\ClearPass\Data\Integrations;

use spkm\ClearPass\Data\Data;

/**
 * A ExtensionInstanceNetworkPort record.
 */
readonly class ExtensionInstanceNetworkPort extends Data
{
    public function __construct(
        /** Network protocol. One of: tcp, udp. */
        public ?string $protocol = null,
        /** Port number for the server. */
        public ?int $host_port = null,
        /** Port number internal to the extension. */
        public ?int $extension_port = null,
        /** Description of the service provided on this port. */
        public ?string $description = null,
    ) {}
}
