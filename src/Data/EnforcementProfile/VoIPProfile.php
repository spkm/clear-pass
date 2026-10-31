<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use spkm\ClearPass\Data\Data;

/**
 * A VoIPProfile record.
 */
readonly class VoIPProfile extends Data
{
    public function __construct(
        /** Numeric ID of the VoIP Profile. */
        public ?int $id = null,
        /** Name of the VoIP Profile. */
        public ?string $name = null,
        /** 802.1p of the VoIP Profile (0-7). */
        public ?string $dot1p = null,
        /** DSCP of the VoIP Profile (0-63). */
        public ?int $dscp = null,
        /** VoIP VLAN of the VoIP Profile (1-4094). */
        public ?int $voip_vlan = null,
    ) {}
}
