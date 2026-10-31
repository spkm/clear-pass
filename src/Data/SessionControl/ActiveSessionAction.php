<?php

namespace spkm\ClearPass\Data\SessionControl;

use spkm\ClearPass\Data\Data;

/**
 * A ActiveSessionAction record.
 */
readonly class ActiveSessionAction extends Data
{
    public function __construct(
        /** Non-zero if a problem occurred. */
        public ?int $error = null,
        /** Describes the result of the operation. */
        public ?string $message = null,
    ) {}
}
