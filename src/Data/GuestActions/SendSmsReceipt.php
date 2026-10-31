<?php

namespace spkm\ClearPass\Data\GuestActions;

use spkm\ClearPass\Data\Data;

/**
 * A SendSmsReceipt record.
 */
readonly class SendSmsReceipt extends Data
{
    public function __construct(
        /** Flag to confirm sending guest receipt via SMS. */
        public ?bool $confirm = null,
    ) {}
}
