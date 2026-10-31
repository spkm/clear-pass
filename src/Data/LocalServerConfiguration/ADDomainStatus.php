<?php

namespace spkm\ClearPass\Data\LocalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A ADDomainStatus record.
 */
readonly class ADDomainStatus extends Data
{
    public function __construct(
        /** Status of AD domain join/leave operation. One of: SUCCESS, RUNNING. */
        public ?string $status = null,
        /** Response message of AD domain join/leave operation. */
        public ?string $status_message = null,
    ) {}
}
