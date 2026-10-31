<?php

namespace spkm\ClearPass\Data\LocalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A ServerFipsResponse record.
 */
readonly class ServerFipsResponse extends Data
{
    public function __construct(
        /** Indicates if FIPS mode has been enabled on this server. */
        public ?bool $fips_mode = null,
    ) {}
}
