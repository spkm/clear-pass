<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use spkm\ClearPass\Data\Data;

/**
 * A QoSProfile record.
 */
readonly class QoSProfile extends Data
{
    public function __construct(
        /** Numeric ID of the QoS Profile. */
        public ?int $id = null,
        /** Name of the QoS Profile. */
        public ?string $name = null,
        /** Drop Precedence of the QoS Profile. One of: high, low. */
        public ?string $drop_precedence = null,
        /** 802.1p of the QoS Profile (0-7). */
        public ?int $dot1p = null,
        /** DSCP of the QoS Profile (0-63). */
        public ?int $dscp = null,
        /** Traffic Class of the QoS Profile (0-7). */
        public ?int $traffic_class = null,
    ) {}
}
