<?php

namespace spkm\ClearPass\Data\EndpointVisibility;

use spkm\ClearPass\Data\Data;

/**
 * A ActiveSyncAttributes record.
 */
readonly class ActiveSyncAttributes extends Data
{
    /**
     * @param  array<int, string>|null  $device_model
     * @param  array<int, string>|null  $device_type
     * @param  array<int, string>|null  $ip
     * @param  array<int, string>|null  $user_agent
     */
    public function __construct(
        /** ActiveSync Device Model. */
        public ?array $device_model = null,
        /** ActiveSync Device Type. */
        public ?array $device_type = null,
        /** ActiveSync IP Address. */
        public ?array $ip = null,
        /** ActiveSync User Agent. */
        public ?array $user_agent = null,
    ) {}
}
