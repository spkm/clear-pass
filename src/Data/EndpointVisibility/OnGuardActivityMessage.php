<?php

namespace spkm\ClearPass\Data\EndpointVisibility;

use spkm\ClearPass\Data\Data;

/**
 * A OnGuardActivityMessage record.
 */
readonly class OnGuardActivityMessage extends Data
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
        /** URL. */
        public ?string $info_url = null,
    ) {}
}
