<?php

namespace spkm\ClearPass\Data\EndpointVisibility;

use spkm\ClearPass\Data\Data;

/**
 * A FingerprintDictionary record.
 */
readonly class FingerprintDictionary extends Data
{
    public function __construct(
        /** ID of the fingerprint. */
        public ?int $id = null,
        /** Category name of the fingerprint. */
        public ?string $category = null,
        /** Family name of the fingerprint. */
        public ?string $family = null,
        /** Unique name of the fingerprint. */
        public ?string $name = null,
    ) {}
}
