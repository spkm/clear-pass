<?php

namespace spkm\ClearPass\Data\GlobalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A ClusterDbSync record.
 */
readonly class ClusterDbSync extends Data
{
    public function __construct(
        /** Maximum time in seconds to wait for the database sync operation. */
        public ?string $timeout = null,
    ) {}
}
