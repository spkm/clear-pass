<?php

namespace spkm\ClearPass\Data\EndpointVisibility;

use spkm\ClearPass\Data\Data;

/**
 * A OnGuardActivityNotification record.
 */
readonly class OnGuardActivityNotification extends Data
{
    /**
     * @param  array<string, mixed>|null  $host_mac_list
     */
    public function __construct(
        /** List of host MAC Address. */
        public ?array $host_mac_list = null,
        /** Message. */
        public ?string $message = null,
        /** Is a broadcast. */
        public ?bool $is_broadcast = null,
        /** Action. One of: RestartSession, Bounce. */
        public ?string $action = null,
        /** Status of the endpoint. One of: NO_CHANGE, BLOCK_ACCESS, ALLOW_ACCESS. */
        public ?string $endpoint_status = null,
        /** URL. */
        public ?string $info_url = null,
    ) {}
}
