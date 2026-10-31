<?php

namespace spkm\ClearPass\Data\ToolsAndUtilities;

use spkm\ClearPass\Data\Data;

/**
 * A RandomPasswordGeneratorResponse record.
 */
readonly class RandomPasswordGeneratorResponse extends Data
{
    public function __construct(
        /** The random password. */
        public ?string $password = null,
    ) {}
}
