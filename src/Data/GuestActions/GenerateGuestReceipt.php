<?php

namespace spkm\ClearPass\Data\GuestActions;

use spkm\ClearPass\Data\Data;

/**
 * A GenerateGuestReceipt record.
 */
readonly class GenerateGuestReceipt extends Data
{
    public function __construct(
        /** Numeric ID of the guest account. */
        public ?int $guest_id = null,
        /** Numeric ID of the guest print template. */
        public ?int $id = null,
    ) {}
}
