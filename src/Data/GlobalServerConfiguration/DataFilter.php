<?php

namespace spkm\ClearPass\Data\GlobalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A DataFilter record.
 */
readonly class DataFilter extends Data
{
    public function __construct(
        /** Numeric ID of Data Filter. */
        public ?int $id = null,
        /** Name of the Data Filter. */
        public ?string $name = null,
        /** Type of the Data Filter. i.e. SESSION or ACCOUNTING or INSIGHT. */
        public ?string $type = null,
        /** Configuration type of the Data Filter. One of: custom_sql, attribute_rules. */
        public ?string $configuration_type = null,
        /** Attribute type (RADIUS/TACACS+/Any) of the Data Filter. Required only when type is ACCOUNTING. */
        public ?string $attr_type = null,
        /** Custom SQL of the Data Filter. */
        public ?string $custom_sql = null,
        /** Description of the Data Filter. */
        public ?string $description = null,
        /** Rule Evaluation Algorithm for rules of Data Filter, applicable only for attributes. One of: evaluate-all, first-applicable. */
        public ?string $rule_eval_algo = null,
        /** List of Rules for Data Filter, applicable only for attributes. */
        public ?RulesSettings $rules = null,
        /** Template name for Data Filter (applicable when type=INSIGHT). */
        public ?string $template = null,
    ) {}
}
