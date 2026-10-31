<?php

namespace spkm\ClearPass\Data\GlobalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A RulesSettings record.
 */
readonly class RulesSettings extends Data
{
    public function __construct(
        /** Matches ANY/ALL the conditions specified in the rule. One of: AND, OR. */
        public ?string $match_type = null,
        /** Conditions of data filter attribute rules. */
        public ?RulesConditionSettings $condition = null,
    ) {}
}
