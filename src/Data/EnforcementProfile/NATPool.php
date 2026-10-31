<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use spkm\ClearPass\Data\Data;

/**
 * A NATPool record.
 */
readonly class NATPool extends Data
{
    public function __construct(
        /** Numeric ID of the NAT Pool. */
        public ?int $id = null,
        /** Name of the NAT Pool. */
        public ?string $name = null,
        /** Start of source NAT range. */
        public ?string $start_src_range = null,
        /** End of source NAT range. */
        public ?string $end_src_range = null,
        /** Destination NAT IP Address. */
        public ?string $destination_nat_ip_address = null,
    ) {}
}
