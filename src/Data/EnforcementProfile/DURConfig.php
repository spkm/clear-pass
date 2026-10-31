<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use spkm\ClearPass\Data\Data;

/**
 * A DURConfig record.
 */
readonly class DURConfig extends Data
{
    public function __construct(
        /** AOS-CX Downloadable Role Configuration. */
        public ?AOSCXConfig $aos_cx_config = null,
        /** ArubaOS-Switch Downloadable Role Configuration. */
        public ?ArubaOSSwitchConfig $aruba_os_switch_config = null,
        /** Role Configuration Mode for Aruba Downloadable Role Enforcement profile. One of: Standard, Advanced. */
        public ?string $config_mode = null,
        /** Mobility Access Switch Downloadable Role Configuration. */
        public ?MASConfig $mobility_access_switch_config = null,
        /** Mobility Controller Downloadable Role Configuration. */
        public ?AMCConfig $mobility_controller_config = null,
        /** Product Name for Aruba Downloadable Role Enforcement profile. One of: AOS-CX, Mobility Controller, ArubaOS-Switch, Mobility Access Switch. */
        public ?string $product = null,
    ) {}
}
