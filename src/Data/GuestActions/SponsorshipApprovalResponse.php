<?php

namespace spkm\ClearPass\Data\GuestActions;

use spkm\ClearPass\Data\Data;

/**
 * A SponsorshipApprovalResponse record.
 */
readonly class SponsorshipApprovalResponse extends Data
{
    protected const EXTRA = true;

    /**
     * @param  array<string, mixed>|null  $guest_receipt
     * @param  array<string, mixed>|null  $user
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        /** Flag indicating the account was deleted. */
        public ?bool $_confirm_reject = null,
        /** Flag indicating the operation was successful. */
        public ?bool $_confirm_success = null,
        /** Object containing guest receipt details. */
        public ?array $guest_receipt = null,
        /** A message describing any actions taken. */
        public ?string $message = null,
        /** Object containing guest account details. */
        public ?array $user = null,
        /** Further fields ClearPass stores on this record, such as custom fields, sent back at the top level. */
        public array $extra = [],
    ) {}
}
