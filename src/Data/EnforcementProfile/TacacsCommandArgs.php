<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use spkm\ClearPass\Data\Data;

/**
 * A TacacsCommandArgs record.
 */
readonly class TacacsCommandArgs extends Data
{
    public function __construct(
        /** Command Argument. */
        public ?string $argument = null,
        /** Enable to permit unmatched action. */
        public ?bool $permit_action = null,
    ) {}
}
