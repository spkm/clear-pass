<?php

namespace spkm\ClearPass\Data\SessionControl;

use spkm\ClearPass\Data\Data;

/**
 * A SessionActionParams record.
 */
readonly class SessionActionParams extends Data
{
    /**
     * @param  array<string, mixed>|null  $enforcement_profile
     * @param  array<string, mixed>|null  $filter
     */
    public function __construct(
        /** When performing CoA, the 'enforcement_profile' parameter MUST be provided, e.g. "enforcement_profile":["...", "...'"]. */
        public ?array $enforcement_profile = null,
        /** JSON filter expression specifying the items to return, e.g. "filter":{"username":"admin", ...}. */
        public ?array $filter = null,
        /** Sorting the result set, e.g. "sort": "-id". */
        public ?string $sort = null,
    ) {}
}
