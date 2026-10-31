<?php

namespace spkm\ClearPass\Data\GlobalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A PolicyManagerZone record.
 */
readonly class PolicyManagerZone extends Data
{
    public function __construct(
        /** Numeric id of Policy Manager Zone. */
        public ?int $zone_id = null,
        /** Name of the Policy Manager Zone. */
        public ?string $zone_name = null,
    ) {}
}
