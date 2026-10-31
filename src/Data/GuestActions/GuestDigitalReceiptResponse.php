<?php

namespace spkm\ClearPass\Data\GuestActions;

use spkm\ClearPass\Data\Data;

/**
 * A GuestDigitalReceiptResponse record.
 */
readonly class GuestDigitalReceiptResponse extends Data
{
    /**
     * @param  array<string, mixed>|null  $digital_pass
     */
    public function __construct(
        /** Object containing guest digital pass in application/vnd.apple.pkpass format. */
        public ?array $digital_pass = null,
    ) {}
}
