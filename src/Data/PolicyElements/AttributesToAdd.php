<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A AttributesToAdd record.
 */
readonly class AttributesToAdd extends Data
{
    public function __construct(
        /** Type. */
        public ?string $type = null,
        /** Name. */
        public ?string $name = null,
        /** Value. */
        public ?string $value = null,
    ) {}
}
