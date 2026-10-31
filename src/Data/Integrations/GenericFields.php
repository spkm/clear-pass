<?php

namespace spkm\ClearPass\Data\Integrations;

use spkm\ClearPass\Data\Data;

/**
 * A GenericFields record.
 */
readonly class GenericFields extends Data
{
    public function __construct(
        /** Ingress Event Generic Field attribute name. */
        public ?string $attr_name = null,
        /** Ingress Event Generic name of the attribute. */
        public ?string $generic_name = null,
    ) {}
}
