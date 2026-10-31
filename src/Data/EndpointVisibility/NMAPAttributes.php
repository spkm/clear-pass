<?php

namespace spkm\ClearPass\Data\EndpointVisibility;

use spkm\ClearPass\Data\Data;

/**
 * A NMAPAttributes record.
 */
readonly class NMAPAttributes extends Data
{
    /**
     * @param  array<int, string>|null  $device
     */
    public function __construct(
        /** Nmap Device Name. */
        public ?array $device = null,
    ) {}
}
