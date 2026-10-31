<?php

namespace spkm\ClearPass\Data\GlobalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A Privilege record.
 */
readonly class Privilege extends Data
{
    public function __construct(
        public ?string $name = null,
        public ?string $desc = null,
        public ?string $type = null,
    ) {}
}
