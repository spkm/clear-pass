<?php

namespace spkm\ClearPass\Data\GlobalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A ApplicationLicenseSummary record.
 */
readonly class ApplicationLicenseSummary extends Data
{
    public function __construct(
        /** License type. One of: Access, OnGuard, Onboard, Entry, Access Upgrade. */
        public ?string $license_type = null,
        /** Total count. */
        public ?int $licensed_count = null,
        /** Used count. */
        public ?int $used_count = null,
        /** Last updated at. */
        public ?string $updated_at = null,
    ) {}
}
