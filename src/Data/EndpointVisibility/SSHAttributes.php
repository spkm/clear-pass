<?php

namespace spkm\ClearPass\Data\EndpointVisibility;

use spkm\ClearPass\Data\Data;

/**
 * A SSHAttributes record.
 */
readonly class SSHAttributes extends Data
{
    /**
     * @param  array<int, string>|null  $device_name
     */
    public function __construct(
        /** SSH device name. */
        public ?array $device_name = null,
    ) {}
}
