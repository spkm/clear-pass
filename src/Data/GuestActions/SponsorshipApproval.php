<?php

namespace spkm\ClearPass\Data\GuestActions;

use spkm\ClearPass\Data\Data;

/**
 * A SponsorshipApproval record.
 */
readonly class SponsorshipApproval extends Data
{
    public function __construct(
        /** Registration token. */
        public ?string $token = null,
        /** Registration token. */
        public ?string $register_token = null,
        /** Timestamp for new expiration time; used if modify_expire_time is "expire_time". */
        public ?string $confirm_expire_time = null,
        /** Override the guest expiration time. */
        public ?string $modify_expire_time = null,
        /** Set to true to reject the sponsorship request. */
        public ?bool $register_reject = null,
        /** Override the guest role. */
        public ?int $role_id = null,
    ) {}
}
