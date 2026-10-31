<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A AttributesToDelete record.
 */
readonly class AttributesToDelete extends Data
{
    public function __construct(
        /** Type. */
        public ?string $type = null,
        /** Name. */
        public ?string $name = null,
    ) {}
}
