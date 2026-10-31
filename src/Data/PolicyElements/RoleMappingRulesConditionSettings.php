<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A RoleMappingRulesConditionSettings record.
 */
readonly class RoleMappingRulesConditionSettings extends Data
{
    public function __construct(
        /** Condition type. */
        public ?string $type = null,
        /** Condition name. */
        public ?string $name = null,
        /** Condition operator. */
        public ?string $oper = null,
        /** Condition value. */
        public ?string $value = null,
        /** Display value name. */
        public ?string $value_disp_name = null,
    ) {}
}
