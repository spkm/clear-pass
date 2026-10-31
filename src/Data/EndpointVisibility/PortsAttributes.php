<?php

namespace spkm\ClearPass\Data\EndpointVisibility;

use spkm\ClearPass\Data\Data;

/**
 * A PortsAttributes record.
 */
readonly class PortsAttributes extends Data
{
    /**
     * @param  array<int, string>|null  $open
     */
    public function __construct(
        /** Open Ports. */
        public ?array $open = null,
    ) {}
}
