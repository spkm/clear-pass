<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use spkm\ClearPass\Data\Data;

/**
 * A CaptivePortalProfile record.
 */
readonly class CaptivePortalProfile extends Data
{
    public function __construct(
        /** Numeric ID of the Captive Portal Profile. */
        public ?int $id = null,
        /** Name of the Captive Portal Profile. */
        public ?string $name = null,
        /** URL for ArubaOS-Switch and AOS-CX Captive Portal Profile. */
        public ?string $url = null,
        /** Attributes for Mobility Access Switch and Mobility Controller Captive Portal Profile. */
        public ?AosAttributes $aos_attributes = null,
        /** URL HashKey for ArubaOS-Switch Captive Portal Profile. */
        public ?string $url_hashkey = null,
    ) {}
}
