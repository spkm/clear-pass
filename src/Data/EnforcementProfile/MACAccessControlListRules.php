<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use spkm\ClearPass\Data\Data;

/**
 * A MACAccessControlListRules record.
 */
readonly class MACAccessControlListRules extends Data
{
    public function __construct(
        /** Action. One of: permit, deny. */
        public ?string $action = null,
        /** MAC Address Type. One of: any, host, value. */
        public ?string $mac_address_type = null,
        /** MAC Address Value (eg. AA:BB:CC:DD:EE:FF). */
        public ?string $mac_address_value = null,
        /** Subnet Bits (eg. AA:BB:CC:DD:EE:FF). */
        public ?string $subnet_bits = null,
    ) {}
}
