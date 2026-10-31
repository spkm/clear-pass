<?php

namespace spkm\ClearPass\Data\ApiOperations;

use spkm\ClearPass\Data\Data;

/**
 * A TokenInfo record.
 */
readonly class TokenInfo extends Data
{
    protected const EXTRA = true;

    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        /** Defaults to the operator profile name. */
        public ?string $info = null,
        /** Defaults to the authenticated username. */
        public ?string $name = null,
        /** Further fields ClearPass stores on this record, such as custom fields, sent back at the top level. */
        public array $extra = [],
    ) {}
}
