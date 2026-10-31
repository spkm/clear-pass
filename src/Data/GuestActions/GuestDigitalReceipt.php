<?php

namespace spkm\ClearPass\Data\GuestActions;

use spkm\ClearPass\Data\Data;

/**
 * A GuestDigitalReceipt record.
 */
readonly class GuestDigitalReceipt extends Data
{
    public function __construct(
        /** Numeric ID of the guest account. */
        public ?int $guest_id = null,
        /** Numeric ID of the digital pass template. */
        public ?int $id = null,
    ) {}
}
