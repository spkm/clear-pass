<?php

namespace spkm\ClearPass\Data\GuestActions;

use spkm\ClearPass\Data\Data;

/**
 * A SmtpReceiptResponse record.
 */
readonly class SmtpReceiptResponse extends Data
{
    protected const EXTRA = true;

    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        /** Message describing the error; not present if operation was successful. */
        public ?string $error = null,
        /** Further fields ClearPass stores on this record, such as custom fields, sent back at the top level. */
        public array $extra = [],
    ) {}
}
