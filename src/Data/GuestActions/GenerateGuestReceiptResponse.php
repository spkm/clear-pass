<?php

namespace spkm\ClearPass\Data\GuestActions;

use spkm\ClearPass\Data\Data;

/**
 * A GenerateGuestReceiptResponse record.
 */
readonly class GenerateGuestReceiptResponse extends Data
{
    /**
     * @param  array<string, mixed>|null  $guest_receipt
     */
    public function __construct(
        /** Object containing guest receipt. */
        public ?array $guest_receipt = null,
    ) {}
}
