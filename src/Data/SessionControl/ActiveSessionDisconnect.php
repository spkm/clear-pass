<?php

namespace spkm\ClearPass\Data\SessionControl;

use spkm\ClearPass\Data\Data;

/**
 * A ActiveSessionDisconnect record.
 */
readonly class ActiveSessionDisconnect extends Data
{
    public function __construct(
        /** ID of the session to disconnect. */
        public ?string $id = null,
        /** Flag to confirm disconnecting the active session. */
        public ?bool $confirm_disconnect = null,
    ) {}
}
