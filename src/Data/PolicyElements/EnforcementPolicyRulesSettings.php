<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A EnforcementPolicyRulesSettings record.
 */
readonly class EnforcementPolicyRulesSettings extends Data
{
    public function __construct(
        /** List of Enforcement Profile names for a rule. */
        public ?string $enforcement_profile_names = null,
        /** Conditions of Enforcement Policy rules. */
        public ?EnforcementPolicyRulesConditionSettings $condition = null,
    ) {}
}
