<?php

namespace spkm\ClearPass\Data\SessionControl;

use spkm\ClearPass\Data\Data;

/**
 * A SessionActionList record.
 */
readonly class SessionActionList extends Data
{
    /**
     * @param  array<string, mixed>|null  $_embedded
     */
    public function __construct(
        /** Unique ID to fetch synchronously or an asynchronously performed session action. */
        public ?string $action_id = null,
        /** pending || running || complete || failed. */
        public ?string $status = null,
        /** Object containing result. */
        public ?array $_embedded = null,
        /** Total number of sessions matched by the filter. */
        public ?int $count = null,
        /** Number of sessions that have been processed with failure or not able to process. */
        public ?int $count_failed = null,
        /** Number of sessions that have not yet been processed. */
        public ?int $count_queue = null,
        /** Number of sessions that have been processed successfully. */
        public ?int $count_success = null,
    ) {}
}
