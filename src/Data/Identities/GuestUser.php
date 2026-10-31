<?php

namespace spkm\ClearPass\Data\Identities;

use Carbon\CarbonImmutable;
use spkm\ClearPass\Data\Data;

/**
 * A GuestUser record.
 */
readonly class GuestUser extends Data
{
    protected const EXTRA = true;

    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        /** Read-only property indicating the current state of the account. One of: active, disabled, expired, pending. */
        public ?string $current_state = null,
        /** Flag indicating if the account is enabled. */
        public ?bool $enabled = null,
        /** Time at which the account will expire. */
        public ?CarbonImmutable $expire_time = null,
        /** Numeric ID of the guest account. */
        public ?int $id = null,
        /** Role to assign to the account. */
        public ?int $role_id = null,
        /** Role name of the account. */
        public ?string $role_name = null,
        /** Name of the sponsor of the account. */
        public ?string $sponsor_name = null,
        /** Profile of the sponsor of the account. */
        public ?string $sponsor_profile = null,
        /** Time at which the account will be enabled. */
        public ?CarbonImmutable $start_time = null,
        /** Username of the account. */
        public ?string $username = null,
        /** Time at which the account was created. */
        public ?CarbonImmutable $create_time = null,
        /** Action to take when the expire_time is reached. */
        public ?int $do_expire = null,
        /** Email address for the account. */
        public ?string $email = null,
        /** MAC address of the guest’s device. */
        public ?string $mac = null,
        /** Comments or notes stored with the account. */
        public ?string $notes = null,
        /** Password for the account. */
        public ?string $password = null,
        /** Number of simultaneous sessions allowed for the account. */
        public ?int $simultaneous_use = null,
        /** Email address of the sponsor. */
        public ?string $sponsor_email = null,
        /** The guest’s company name. */
        public ?string $visitor_company = null,
        /** The guest’s full name. */
        public ?string $visitor_name = null,
        /** The guest’s contact telephone number. */
        public ?string $visitor_phone = null,
        /** Further fields ClearPass stores on this record, such as custom fields, sent back at the top level. */
        public array $extra = [],
    ) {}
}
