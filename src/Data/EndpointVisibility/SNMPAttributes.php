<?php

namespace spkm\ClearPass\Data\EndpointVisibility;

use spkm\ClearPass\Data\Data;

/**
 * A SNMPAttributes record.
 */
readonly class SNMPAttributes extends Data
{
    /**
     * @param  array<int, string>|null  $cdp_cache_platform
     * @param  array<int, string>|null  $device_type
     * @param  array<int, string>|null  $hr_device_descr
     * @param  array<int, string>|null  $lldp_sys_descr
     * @param  array<int, string>|null  $name
     * @param  array<int, string>|null  $sys_descr
     * @param  array<int, string>|null  $sys_name
     */
    public function __construct(
        /** CDP Device Description. */
        public ?array $cdp_cache_platform = null,
        /** SNMP Device Type. */
        public ?array $device_type = null,
        /** SNMP Device Description. */
        public ?array $hr_device_descr = null,
        /** null. */
        public ?array $lldp_sys_descr = null,
        /** SNMP Device Name. */
        public ?array $name = null,
        /** SNMP System Description. */
        public ?array $sys_descr = null,
        /** SNMP System Name. */
        public ?array $sys_name = null,
    ) {}
}
