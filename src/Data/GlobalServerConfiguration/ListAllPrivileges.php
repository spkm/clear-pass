<?php

namespace spkm\ClearPass\Data\GlobalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A ListAllPrivileges record.
 */
readonly class ListAllPrivileges extends Data
{
    /**
     * @param  array<string, mixed>|null  $privileges
     */
    public function __construct(
        /** List of system-defined privileges. */
        public ?array $privileges = null,
    ) {}
}
