<?php

namespace spkm\ClearPass\Data\SessionControl;

use spkm\ClearPass\Data\Data;

/**
 * A ActiveSessionReauthorize record.
 */
readonly class ActiveSessionReauthorize extends Data
{
    public function __construct(
        /** Flag to confirm the session reauthorization. */
        public ?bool $confirm_reauthorize = null,
        /** Specify the name of the reauthorization profile to apply to the session. */
        public ?string $reauthorize_profile = null,
    ) {}
}
