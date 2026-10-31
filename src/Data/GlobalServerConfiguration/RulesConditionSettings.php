<?php

namespace spkm\ClearPass\Data\GlobalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A RulesConditionSettings record.
 */
readonly class RulesConditionSettings extends Data
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
    ) {}
}
