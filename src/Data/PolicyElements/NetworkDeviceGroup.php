<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A NetworkDeviceGroup record.
 */
readonly class NetworkDeviceGroup extends Data
{
    public function __construct(
        /** Numeric ID of the network device group. */
        public ?int $id = null,
        /** Name of the network device group. */
        public ?string $name = null,
        /** Format of the network devices. One of: subnet, regex, list. */
        public ?string $group_format = null,
        /** Network devices in the specified format. */
        public ?string $value = null,
        /** Description of the network device group. */
        public ?string $description = null,
    ) {}
}
