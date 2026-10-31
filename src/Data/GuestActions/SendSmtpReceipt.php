<?php

namespace spkm\ClearPass\Data\GuestActions;

use spkm\ClearPass\Data\Data;

/**
 * A SendSmtpReceipt record.
 */
readonly class SendSmtpReceipt extends Data
{
    public function __construct(
        /** Flag to confirm sending guest receipt via SMTP. */
        public ?bool $confirm = null,
    ) {}
}
