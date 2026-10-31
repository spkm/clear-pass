<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A ValidValue record.
 */
readonly class ValidValue extends Data
{
    public function __construct(
        /** Value Enum of RADIUS Dictionary Attribute Valid Value. */
        public ?string $value = null,
        /** Value of RADIUS Dictionary Attribute Valid Value. */
        public ?int $value_enum = null,
    ) {}
}
