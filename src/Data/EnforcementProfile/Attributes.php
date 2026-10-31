<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use spkm\ClearPass\Data\Data;

/**
 * A Attributes record.
 */
readonly class Attributes extends Data
{
    public function __construct(
        /** Name of the Attribute. */
        public ?string $name = null,
        /** Type of the Attribute. */
        public ?string $type = null,
        /** Value of the Attribute. */
        public ?string $value = null,
    ) {}
}
