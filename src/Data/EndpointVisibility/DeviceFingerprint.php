<?php

namespace spkm\ClearPass\Data\EndpointVisibility;

use spkm\ClearPass\Data\Data;

/**
 * A DeviceFingerprint record.
 */
readonly class DeviceFingerprint extends Data
{
    /**
     * @param  array<string, mixed>|null  $details
     */
    public function __construct(
        /** MAC address of device. */
        public ?string $mac = null,
        /** IP address of device. */
        public ?string $ip = null,
        /** Hostname of device. */
        public ?string $hostname = null,
        /** Category of the profiled device. */
        public ?string $device_category = null,
        /** Operating system that the device runs on. */
        public ?string $device_family = null,
        /** Name of the profiled device. */
        public ?string $device_name = null,
        /** Date and time at which the device is added. */
        public ?string $added_at = null,
        /** Date and time at which the device is updated. */
        public ?string $updated_at = null,
        /** Fingerprint details. */
        public ?array $details = null,
        /** Active Sync attributes as JSON. */
        public ?ActiveSyncAttributes $active_sync = null,
        /** Device attributes as JSON. */
        public ?DeviceAttributes $device = null,
        /** DHCP attributes as JSON. */
        public ?DHCPAttributes $dhcp = null,
        /** Host attributes as JSON. */
        public ?HostAttributes $host = null,
        /** NMAP attributes as JSON. */
        public ?NMAPAttributes $nmap = null,
        /** Port attributes as JSON. */
        public ?PortsAttributes $ports = null,
        /** SNMP attributes as JSON. */
        public ?SNMPAttributes $snmp = null,
        /** SSH attributes as JSON. */
        public ?SSHAttributes $ssh = null,
        /** TCP attributes as JSON. */
        public ?TCPAttributes $tcp = null,
        /** WMI attributes as JSON. */
        public ?WMIAttributes $wmi = null,
    ) {}
}
