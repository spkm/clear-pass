<?php

namespace spkm\ClearPass\Data\LocalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A InstalledPatchInfo record.
 */
readonly class InstalledPatchInfo extends Data
{
    public function __construct(
        /** Unique name of the patch. */
        public ?string $name = null,
        /** Time and date of the patch installation. */
        public ?string $installed = null,
        /** Description of the patch. */
        public ?string $description = null,
    ) {}
}
