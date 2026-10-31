<?php

namespace spkm\ClearPass\Data\EndpointVisibility;

use spkm\ClearPass\Data\Data;

/**
 * A OnGuardActivityResponse record.
 */
readonly class OnGuardActivityResponse extends Data
{
    public function __construct(
        /** Response Message. */
        public ?string $response_message = null,
    ) {}
}
