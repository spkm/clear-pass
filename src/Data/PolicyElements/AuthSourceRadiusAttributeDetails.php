<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A AuthSourceRadiusAttributeDetails record.
 */
readonly class AuthSourceRadiusAttributeDetails extends Data
{
    public function __construct(
        /** attribute display value of AuthSourceRadiusAttribute. */
        public ?string $attribute_display_value = null,
        /** attribute ID of AuthSourceRadiusAttribute. */
        public ?int $attribute_id = null,
        /** attribute operation of AuthSourceRadiusAttribute. */
        public ?int $attribute_operation = null,
        /** attribute value of AuthSourceRadiusAttribute. */
        public ?string $attribute_value = null,
        /** vendor ID of AuthSourceRadiusAttribute. */
        public ?int $vendor_id = null,
    ) {}
}
