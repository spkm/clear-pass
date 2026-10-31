<?php

namespace spkm\ClearPass\Data\ToolsAndUtilities;

use spkm\ClearPass\Data\Data;

/**
 * A RandomMpskGeneratorResponse record.
 */
readonly class RandomMpskGeneratorResponse extends Data
{
    public function __construct(
        /** The random MPSK. */
        public ?string $mpsk = null,
    ) {}
}
