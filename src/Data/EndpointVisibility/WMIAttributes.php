<?php

namespace spkm\ClearPass\Data\EndpointVisibility;

use spkm\ClearPass\Data\Data;

/**
 * A WMIAttributes record.
 */
readonly class WMIAttributes extends Data
{
    /**
     * @param  array<int, string>|null  $os_name
     */
    public function __construct(
        /** WMI OS Name. */
        public ?array $os_name = null,
    ) {}
}
