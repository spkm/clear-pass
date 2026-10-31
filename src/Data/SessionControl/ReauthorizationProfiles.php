<?php

namespace spkm\ClearPass\Data\SessionControl;

use spkm\ClearPass\Data\Data;

/**
 * A ReauthorizationProfiles record.
 */
readonly class ReauthorizationProfiles extends Data
{
    /**
     * @param  array<int, string>|null  $profiles
     */
    public function __construct(
        /** List of reauthorization profiles that may be applied to the session. */
        public ?array $profiles = null,
    ) {}
}
