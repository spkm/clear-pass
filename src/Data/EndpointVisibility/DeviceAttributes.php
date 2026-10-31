<?php

namespace spkm\ClearPass\Data\EndpointVisibility;

use spkm\ClearPass\Data\Data;

/**
 * A DeviceAttributes record.
 */
readonly class DeviceAttributes extends Data
{
    /**
     * @param  array<int, string>|null  $category
     * @param  array<int, string>|null  $family
     * @param  array<int, string>|null  $name
     */
    public function __construct(
        /** Device Category. */
        public ?array $category = null,
        /** Device Family. */
        public ?array $family = null,
        /** Device Name. */
        public ?array $name = null,
    ) {}
}
