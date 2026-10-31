<?php

namespace spkm\ClearPass\Data\Identities;

use Carbon\CarbonImmutable;
use spkm\ClearPass\Data\Data;

/**
 * A Device record.
 */
readonly class Device extends Data
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
        /** Numeric ID of the device account. */
        public ?int $id = null,
        /** Flag indicating the account is a device, always set to true. */
        public ?bool $mac_auth = null,
        /** MAC address of the device. */
        public ?string $mac = null,
        /** Role to assign to the account. */
        public ?int $role_id = null,
        /** Name of the role assigned to the account. */
        public ?string $role_name = null,
        /** Name of the sponsor of the account. */
        public ?string $sponsor_name = null,
        /** Numeric operator profile ID for the account’s sponsor. */
        public ?string $sponsor_profile = null,
        /** Time at which the account will be enabled. */
        public ?CarbonImmutable $start_time = null,
        public ?string $username = null,
        /** Time at which the account was created. */
        public ?CarbonImmutable $create_time = null,
        /** Comments or notes stored with the account. */
        public ?string $notes = null,
        public ?string $password = null,
        /** Origin of the account. */
        public ?string $source = null,
        /** Name of the operator profile for the account’s sponsor. */
        public ?string $sponsor_profile_name = null,
        /** Name to display for the account. */
        public ?string $visitor_name = null,
        /** Further fields ClearPass stores on this record, such as custom fields, sent back at the top level. */
        public array $extra = [],
    ) {}
}
