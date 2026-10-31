<?php

namespace spkm\ClearPass\Data\GlobalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A ClusterDbSyncResponse record.
 */
readonly class ClusterDbSyncResponse extends Data
{
    public function __construct(
        /** Status of the operation. */
        public ?int $error = null,
        /** Indicates if this is a publisher node. */
        public ?bool $is_publisher = null,
        /** Describes the error. */
        public ?string $message = null,
        /** Time in seconds taken to synchronize. */
        public ?float $sync_time = null,
        /** Maximum time in seconds to wait for the database sync operation. */
        public ?float $timeout = null,
        /** Set if timeout was reached without confirmation of cluster database sync. */
        public ?int $timeout_error = null,
    ) {}
}
