<?php

namespace spkm\ClearPass\Data\Identities;

use spkm\ClearPass\Data\Data;

/**
 * A StaticHostList record.
 */
readonly class StaticHostList extends Data
{
    /**
     * @param  array<string, mixed>|null  $host_entries
     */
    public function __construct(
        /** Numeric ID of the static host list. */
        public ?int $id = null,
        /** Name of the static host list. */
        public ?string $name = null,
        /** Format of the static host list. One of: subnet, regex, list. */
        public ?string $host_format = null,
        /** Host type of the static host list. One of: IPAddress, MACAddress. */
        public ?string $host_type = null,
        /** Description of the static host list. */
        public ?string $description = null,
        /** List of host entries (Address and Description) for the host format "List". For example, "host_entries":[{"host_address": "10.21.11.117", "host_address_desc" : "My host address description."}, {..} ..]. */
        public ?array $host_entries = null,
        /** Value for the host format "Subnet" and "Regular Expression". */
        public ?string $value = null,
    ) {}
}
