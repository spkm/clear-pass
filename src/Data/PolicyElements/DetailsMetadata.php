<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A DetailsMetadata record.
 */
readonly class DetailsMetadata extends Data
{
    public function __construct(
        /** Attribute name of AuthSourceFilterDetails. */
        public ?string $attribute_name = null,
        /** Attribute Value of AuthSourceFilterDetails. */
        public ?string $attribute_value = null,
    ) {}
}
