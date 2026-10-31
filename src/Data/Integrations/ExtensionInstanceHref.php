<?php

namespace spkm\ClearPass\Data\Integrations;

use spkm\ClearPass\Data\Data;

/**
 * A ExtensionInstanceHref record.
 */
readonly class ExtensionInstanceHref extends Data
{
    public function __construct(
        /** Server-relative URL path. */
        public ?string $href = null,
        /** Description of the URL. */
        public ?string $description = null,
    ) {}
}
