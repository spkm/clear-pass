<?php

namespace spkm\ClearPass\Data\Logs;

use spkm\ClearPass\Data\Data;

/**
 * A SystemEvents record.
 */
readonly class SystemEvents extends Data
{
    public function __construct(
        /** Source. */
        public ?string $source = null,
        /** Level. One of: INFO, ERROR, WARN. */
        public ?string $level = null,
        /** Category. */
        public ?string $category = null,
        /** Action. */
        public ?string $action = null,
        /** Description. */
        public ?string $description = null,
        /** Timestamp. */
        public ?string $timestamp = null,
    ) {}
}
