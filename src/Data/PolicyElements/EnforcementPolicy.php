<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A EnforcementPolicy record.
 */
readonly class EnforcementPolicy extends Data
{
    public function __construct(
        /** Numeric ID of Enforcement Policy. */
        public ?int $id = null,
        /** Name of the Enforcement Policy. */
        public ?string $name = null,
        /** Enforcement Type of the Enforcement Policy. One of: RADIUS, TACACS, WEBAUTH, Application, Event. */
        public ?string $enforcement_type = null,
        /** Default Enforcement Profile for the Enforcement Policy. */
        public ?string $default_enforcement_profile = null,
        /** Rule Evaluation Algorithm of the Enforcement Policy rules. One of: first-applicable, evaluate-all. */
        public ?string $rule_eval_algo = null,
        /** List of Rules for Enforcement Policy. */
        public ?EnforcementPolicyRulesSettings $rules = null,
        /** Description of the Enforcement Policy. */
        public ?string $description = null,
    ) {}
}
