<?php

namespace spkm\ClearPass\Data\SessionControl;

use spkm\ClearPass\Data\Data;

/**
 * A SessionAction record.
 */
readonly class SessionAction extends Data
{
    /**
     * @param  array<string, mixed>|null  $_links
     */
    public function __construct(
        /** Contains a list of links. */
        public ?array $_links = null,
        /** Name of SessionControl action that was used (enforcement profile name). */
        public ?string $dyn_authz_action_name = null,
        /** SessionControl action message either success or failure. */
        public ?string $message = null,
        /** Policy Manager session identifier. */
        public ?string $session_id = null,
        /** Is the session processed successfully. */
        public ?bool $success = null,
    ) {}
}
