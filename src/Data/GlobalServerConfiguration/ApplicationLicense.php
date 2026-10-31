<?php

namespace spkm\ClearPass\Data\GlobalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A ApplicationLicense record.
 */
readonly class ApplicationLicense extends Data
{
    public function __construct(
        /** Numeric ID of License. */
        public ?int $id = null,
        /** Product ID. */
        public ?int $product_id = null,
        /** Product name. One of: Access, OnGuard, Onboard, Entry, Access Upgrade. */
        public ?string $product_name = null,
        /** License key. */
        public ?string $license_key = null,
        /** License type. One of: Permanent, Evaluation. */
        public ?string $license_type = null,
        /** Number of Endpoints for the license. */
        public ?int $user_count = null,
        /** Subscription duration of the license(in years). */
        public ?int $duration = null,
        /** Subscription duration unit. */
        public ?string $duration_units = null,
        /** Date of the license added. */
        public ?string $license_added_on = null,
        /** Activation status of the license. */
        public ?bool $activation_status = null,
        /** Total count. */
        public ?int $licensed_count = null,
        /** Last updated at. */
        public ?string $updated_at = null,
        /** Used count. */
        public ?int $used_count = null,
    ) {}
}
