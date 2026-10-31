<?php

namespace spkm\ClearPass\Data\GlobalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A Attribute record.
 */
readonly class Attribute extends Data
{
    public function __construct(
        /** Numeric ID of the attribute. */
        public ?int $id = null,
        /** Name of the attribute. */
        public ?string $name = null,
        /** Entity Name of the attribute. One of: Device, LocalUser, GuestUser, Endpoint, Onboard. */
        public ?string $entity_name = null,
        /** Data Type of the attribute. One of: Boolean, Date, Day, IPv4Address, IPv6Address, Integer32, List, MACAddress, String, Text, Time, TimeOfDay. */
        public ?string $data_type = null,
        /** Enable this to make this attribute mandatory for the entity. */
        public ?bool $mandatory = null,
        /** To Allow Multiple values of the attribute for Data Type String. */
        public ?bool $allow_multiple = null,
        /** Allowed Value for Data Type List (e.g., example1,example2,example3). */
        public ?string $allowed_value = null,
        /** Default Value of the attribute. */
        public ?string $default_value = null,
    ) {}
}
