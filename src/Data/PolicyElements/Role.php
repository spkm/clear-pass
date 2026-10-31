<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A Role record.
 */
readonly class Role extends Data
{
    public function __construct(
        /** Numeric ID of the role. */
        public ?int $id = null,
        /** Name of the role. */
        public ?string $name = null,
        /** Description of the role. */
        public ?string $description = null,
    ) {}
}
