<?php

namespace spkm\ClearPass\Data\EndpointVisibility;

use spkm\ClearPass\Data\Data;

/**
 * A TCPAttributes record.
 */
readonly class TCPAttributes extends Data
{
    /**
     * @param  array<int, string>|null  $device
     * @param  array<int, string>|null  $fp
     */
    public function __construct(
        /** TCP Device Category. */
        public ?array $device = null,
        /** TCP Fingerprint. */
        public ?array $fp = null,
    ) {}
}
