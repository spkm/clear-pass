<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A RoleMapping record.
 */
readonly class RoleMapping extends Data
{
    public function __construct(
        /** Numeric id of the role mapping. */
        public ?int $id = null,
        /** Role mapping policy name. */
        public ?string $name = null,
        /** Role mapping default role name. */
        public ?string $default_role_name = null,
        /** Role mapping rules evaluation algorithm. One of: first-applicable, evaluate-all. */
        public ?string $rule_combine_algo = null,
        /** List of role mapping rules. */
        public ?RoleMappingRulesSettings $rules = null,
        /** Role mapping description. */
        public ?string $description = null,
    ) {}
}
