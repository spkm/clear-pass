<?php

namespace spkm\ClearPass\Data\EndpointVisibility;

use spkm\ClearPass\Data\Data;

/**
 * A NetworkScan record.
 */
readonly class NetworkScan extends Data
{
    public function __construct(
        /** Type of the Network Scan. One of: DISCOVERY, SUBNET. */
        public ?string $type = null,
        /** Zone for the Network Scan. */
        public ?string $zone = null,
        /** Network IP for DISCOVERY (e.g. ["hostname.example.com", "1.2.3.4"]) or IP Subnets for SUBNET (e.g. ["10.1.0.0/16"]) Network Scan. */
        public ?string $seed_device_or_ip_subnet = null,
        /** Frequency of Network Scan. One of: ONDEMAND, HOURLY, DAILY, WEEKLY. */
        public ?string $scan_frequency = null,
        /** Schedule parameters as string. */
        public ?string $schedule_string = null,
        /** Scan parameters as string. */
        public ?string $scan_params_string = null,
        /** Unique ID of the Network Scan. */
        public ?int $id = null,
        /** Day of Week for WEEKLY Network Scan. One of: MONDAY, TUESDAY, WEDNESDAY, THURSDAY, FRIDAY, SATURDAY, SUNDAY. */
        public ?string $day_of_week = null,
        /** Depth level for DISCOVERY Network Scan. One of: 1, 2, 3, 4, 5. */
        public ?int $depth = null,
        /** Is Network Scan enabled? (default=true). */
        public ?bool $enabled = null,
        /** Interval in hours (3 - 350) for HOURLY Network Scan. */
        public ?int $interval = null,
        /** Probe all ARP entries found (default=false for type="DISCOVERY", not applicable for type="SUBNET"). */
        public ?bool $probe_arp = null,
        /** Start time (HH:MM) of Network Scan (e.g. ["10:40", "23:20"]). */
        public ?string $start_time = null,
    ) {}
}
