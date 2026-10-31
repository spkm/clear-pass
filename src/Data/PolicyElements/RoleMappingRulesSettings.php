<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A RoleMappingRulesSettings record.
 */
readonly class RoleMappingRulesSettings extends Data
{
    public function __construct(
        /** Matches ANY/ALL the conditions specified in the rule. One of: AND, OR. */
        public ?string $match_type = null,
        /** Role name. */
        public ?string $role_name = null,
        /** Conditions of role mapping rules. */
        public ?RoleMappingRulesConditionSettings $condition = null,
    ) {}
}
