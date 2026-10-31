<?php

namespace spkm\ClearPass\Data\EndpointVisibility;

use spkm\ClearPass\Data\Data;

/**
 * A HostAttributes record.
 */
readonly class HostAttributes extends Data
{
    /**
     * @param  array<int, string>|null  $access_type
     * @param  array<int, string>|null  $app_group
     * @param  array<int, string>|null  $device_type
     * @param  array<int, string>|null  $dst_conns
     * @param  array<int, string>|null  $mac_oui
     * @param  array<int, string>|null  $os_type
     * @param  array<int, string>|null  $ports
     * @param  array<int, string>|null  $services
     * @param  array<int, string>|null  $user_agent
     */
    public function __construct(
        /** Access Type. */
        public ?array $access_type = null,
        /** Application Group. */
        public ?array $app_group = null,
        /** Host Device Type. */
        public ?array $device_type = null,
        /** Destination Connections. */
        public ?array $dst_conns = null,
        /** MAC OUI. */
        public ?array $mac_oui = null,
        /** Host OS Type. */
        public ?array $os_type = null,
        /** Host Open Ports. */
        public ?array $ports = null,
        /** Host Services. */
        public ?array $services = null,
        /** Host User Agent. */
        public ?array $user_agent = null,
    ) {}
}
