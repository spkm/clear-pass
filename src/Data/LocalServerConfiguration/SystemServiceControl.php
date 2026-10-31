<?php

namespace spkm\ClearPass\Data\LocalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A SystemServiceControl record.
 */
readonly class SystemServiceControl extends Data
{
    public function __construct(
        /** Service Description. */
        public ?string $description = null,
        /** Service Display Name. */
        public ?string $display_name = null,
        /** Status. */
        public ?string $state = null,
        /** Service is Running or Stopped. */
        public ?bool $is_running = null,
    ) {}
}
