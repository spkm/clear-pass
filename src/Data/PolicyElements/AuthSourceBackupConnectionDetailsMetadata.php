<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A AuthSourceBackupConnectionDetailsMetadata record.
 */
readonly class AuthSourceBackupConnectionDetailsMetadata extends Data
{
    public function __construct(
        /** Connection Details of the Authentication source backup. */
        public ?string $cppm_auth_source_connection_details = null,
        /** Priority of the Authentication Source. */
        public ?int $order_no = null,
    ) {}
}
