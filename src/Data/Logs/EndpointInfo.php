<?php

namespace spkm\ClearPass\Data\Logs;

use spkm\ClearPass\Data\Data;

/**
 * A EndpointInfo record.
 */
readonly class EndpointInfo extends Data
{
    /**
     * @param  array<string, mixed>|null  $ipv6
     * @param  array<string, mixed>|null  $roles
     */
    public function __construct(
        /** MAC Address of the endpoint. */
        public ?string $mac = null,
        /** IP Address of the endpoint. */
        public ?string $ip = null,
        /** IPv6 Address list of the endpoint. */
        public ?array $ipv6 = null,
        /** Username of the endpoint. */
        public ?string $user = null,
        /** Domain of the endpoint. */
        public ?string $domain = null,
        /** Roles list of the endpoint. */
        public ?array $roles = null,
        /** System posture token of the endpoint. One of: HEALTHY, CHECKUP, TRANSITION, QUARANTINE, INFECTED, UNKNOWN. */
        public ?string $spt = null,
        /** Aruba user role of the session. */
        public ?string $aruba_user_role = null,
        /** Aruba user vlan of the session. */
        public ?string $aruba_user_vlan = null,
        /** Device category of the endpoint. */
        public ?string $device_category = null,
        /** Device family of the endpoint. */
        public ?string $device_family = null,
        /** Device name of the endpoint. */
        public ?string $device_name = null,
        /** Flag indicating if the endpoint has conflict. */
        public ?bool $is_conflict = null,
        /** Other category of the endpoint. */
        public ?string $other_category = null,
        /** Other family of the endpoint. */
        public ?string $other_family = null,
        /** Other name of the endpoint. */
        public ?string $other_name = null,
        /** Flag indicating if the endpoint is online. */
        public ?bool $is_online = null,
        /** Time at which the endpoint is updated. */
        public ?string $updated_at = null,
    ) {}
}
