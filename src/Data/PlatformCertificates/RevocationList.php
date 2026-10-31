<?php

namespace spkm\ClearPass\Data\PlatformCertificates;

use spkm\ClearPass\Data\Data;

/**
 * A RevocationList record.
 */
readonly class RevocationList extends Data
{
    public function __construct(
        /** Numeric ID of the Certificate. */
        public ?int $id = null,
        /** URL of the Certificate. */
        public ?string $url = null,
        /** Bypass Proxy status of the Certificate. */
        public ?bool $bypass_proxy = null,
        /** Periodic Update status of the Certificate. */
        public ?bool $periodic_update = null,
        /** Periodic update time of the Certificate. */
        public ?int $periodic_update_interval = null,
        /** Last updated status. */
        public ?string $last_update_status = null,
        /** Last updated time. */
        public ?string $last_updated_time = null,
        /** Next update time. */
        public ?string $next_updated_time = null,
    ) {}
}
