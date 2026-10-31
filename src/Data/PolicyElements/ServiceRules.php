<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A ServiceRules record.
 */
readonly class ServiceRules extends Data
{
    public function __construct(
        /** Type. */
        public ?string $type = null,
        /** Name. */
        public ?string $name = null,
        /** Operator. */
        public ?string $operator = null,
        /** Value. */
        public ?string $value = null,
    ) {}
}
