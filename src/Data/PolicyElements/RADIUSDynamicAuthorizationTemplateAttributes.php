<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A RADIUSDynamicAuthorizationTemplateAttributes record.
 */
readonly class RADIUSDynamicAuthorizationTemplateAttributes extends Data
{
    public function __construct(
        /** RADIUS Dynamic Authorization Template Attribute Input Required. One of: Not_Required, Optional, Required. */
        public ?string $input_required = null,
        /** RADIUS Dynamic Authorization Template Attribute Value. */
        public ?string $value = null,
        /** RADIUS Dynamic Authorization Template Attribute Name. */
        public ?string $name = null,
        /** RADIUS Dynamic Authorization Template Attribute Type. */
        public ?string $type = null,
    ) {}
}
