<?php

namespace spkm\ClearPass\Data\LocalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A ServiceParameter record.
 */
readonly class ServiceParameter extends Data
{
    public function __construct(
        /** Name of the parameter for the service. */
        public ?string $parameter_name = null,
        /** Id assigned to the parameter for the service. */
        public ?int $parameter_id = null,
        /** Current value for the parameter for the service. */
        public ?string $value = null,
        /** Default value assigned to the parameter for the service. */
        public ?string $default_value = null,
        /** Allowed values for the parameter for the service. */
        public ?string $allowed_values = null,
        /** Group name under which the parameter for the service. */
        public ?string $group_name = null,
        /** param_value_1. */
        public ?string $param_name_1 = null,
        /** param_value_2. */
        public ?string $param_name_2 = null,
    ) {}
}
