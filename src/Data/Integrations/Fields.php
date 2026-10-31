<?php

namespace spkm\ClearPass\Data\Integrations;

use spkm\ClearPass\Data\Data;

/**
 * A Fields record.
 */
readonly class Fields extends Data
{
    public function __construct(
        /** Ingress Event Field atrribute name. */
        public ?string $attr_name = null,
        /** Ingress Event Field attribute type. */
        public ?string $data_type = null,
        /** Allowed values for Ingress Event Field in CSV format. */
        public ?string $allowed_values = null,
    ) {}
}
