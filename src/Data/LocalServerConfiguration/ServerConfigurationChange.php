<?php

namespace spkm\ClearPass\Data\LocalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A ServerConfigurationChange record.
 */
readonly class ServerConfigurationChange extends Data
{
    public function __construct(
        /** True if this server has Insight reporting enabled. */
        public ?bool $is_insight_enabled = null,
    ) {}
}
