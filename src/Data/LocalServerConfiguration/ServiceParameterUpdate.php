<?php

namespace spkm\ClearPass\Data\LocalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A ServiceParameterUpdate record.
 */
readonly class ServiceParameterUpdate extends Data
{
    public function __construct(
        /** param_value_1. */
        public ?string $param_name_1 = null,
        /** param_value_2. */
        public ?string $param_name_2 = null,
    ) {}
}
