<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A AttributesMetadata record.
 */
readonly class AttributesMetadata extends Data
{
    public function __construct(
        /** AliasName of AuthSourceFilterAttributes. */
        public ?string $alias_name = null,
        /** Attribute name of AuthSourceFilterAttributes. */
        public ?string $attribute_name = null,
        /** attribute_type of AuthSourceFilterAttributes. */
        public ?string $attribute_type = null,
        /** EnableAsRole of AuthSourceFilterAttributes. */
        public ?bool $enable_as_role = null,
        /** EnableAsUserAttr of AuthSourceFilterAttributes. */
        public ?bool $enable_as_user_attribute = null,
    ) {}
}
