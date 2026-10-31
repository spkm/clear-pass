<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use spkm\ClearPass\Data\Data;

/**
 * A EthertypeAccessControlListRules record.
 */
readonly class EthertypeAccessControlListRules extends Data
{
    public function __construct(
        /** Action. One of: permit, deny. */
        public ?string $action = null,
        /** Ethertype Type. One of: any, value. */
        public ?string $ethertype_type = null,
        /** Ethertype Value (0-65535). */
        public ?int $ethertype_value = null,
        /** Subnet Bits (0-65535). */
        public ?int $subnet_bits = null,
    ) {}
}
