<?php

namespace spkm\ClearPass\Data\EndpointVisibility;

use spkm\ClearPass\Data\Data;

/**
 * A DHCPAttributes record.
 */
readonly class DHCPAttributes extends Data
{
    /**
     * @param  array<int, string>|null  $device_type
     * @param  array<int, string>|null  $option12
     * @param  array<int, string>|null  $option54
     * @param  array<int, string>|null  $option55
     * @param  array<int, string>|null  $option60
     */
    public function __construct(
        /** DHCP Options. */
        public ?array $device_type = null,
        /** DHCP Option12. */
        public ?array $option12 = null,
        /** DHCP Option54. */
        public ?array $option54 = null,
        /** DHCP Option55. */
        public ?array $option55 = null,
        /** DHCP Option60. */
        public ?array $option60 = null,
    ) {}
}
