<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A TACACSServiceDictionaryAttributes record.
 */
readonly class TACACSServiceDictionaryAttributes extends Data
{
    public function __construct(
        /** TACACS+ Service Dictionary Attribute Name. */
        public ?string $attr_name = null,
        /** TACACS+ Service Dictionary Attribute Data Type. */
        public ?string $attr_type = null,
        /** TACACS+ Service Dictionary Attribute Display Name. */
        public ?string $attr_display_name = null,
        /** Allowed Values for TACACS+ Service Dictionary Attributes in CSV format. */
        public ?string $allowed_values = null,
    ) {}
}
