<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A ApplicationDictionaryAttributes record.
 */
readonly class ApplicationDictionaryAttributes extends Data
{
    public function __construct(
        /** Application Dictionary Attribute Name. */
        public ?string $attr_name = null,
        /** Application Dictionary Attribute Type. One of: Integer, String, Boolean, Date-Time, TimeOfDay, Day, Date, List, Text, IPv4Address, IPv6Address, MACAddress. */
        public ?string $attr_type = null,
        /** Allowed Values for Application Dictionary Attributes in CSV format. */
        public ?string $allowed_values = null,
    ) {}
}
