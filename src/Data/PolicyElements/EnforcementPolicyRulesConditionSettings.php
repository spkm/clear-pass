<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A EnforcementPolicyRulesConditionSettings record.
 */
readonly class EnforcementPolicyRulesConditionSettings extends Data
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
