<?php

namespace spkm\ClearPass\Data\Integrations;

use spkm\ClearPass\Data\Data;

/**
 * A EventSources record.
 */
readonly class EventSources extends Data
{
    public function __construct(
        /** Numeric ID of the event source. */
        public ?int $id = null,
        /** Event source Name. */
        public ?string $name = null,
        /** Unique IP Address of the event source. */
        public ?string $ipaddress = null,
        /** Vendor name. One of: Aruba IntroSpect, Check Point, Infoblox, Juniper Networks, Palo Alto Networks. */
        public ?string $vendor = null,
        /** Event source type. One of: Syslog. */
        public ?string $type = null,
        /** Enable event source. */
        public ?bool $enable = null,
        /** Event source description. */
        public ?string $description = null,
    ) {}
}
