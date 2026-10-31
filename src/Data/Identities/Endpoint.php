<?php

namespace spkm\ClearPass\Data\Identities;

use spkm\ClearPass\Data\Data;

/**
 * A Endpoint record.
 */
readonly class Endpoint extends Data
{
    /**
     * @param  array<string, mixed>|null  $attributes
     */
    public function __construct(
        /** Numeric ID of the endpoint. */
        public ?int $id = null,
        /** MAC Address of the endpoint. */
        public ?string $mac_address = null,
        /** Status of the endpoint. One of: Known, Unknown, Disabled. */
        public ?string $status = null,
        /** Additional attributes(key/value pairs) may be stored with the endpoint. */
        public ?array $attributes = null,
        /** Is MAC address randomized?. */
        public ?bool $randomized_mac = null,
        /** Timestamp of endpoint addition. */
        public ?string $added_at = null,
        /** Description of the endpoint. */
        public ?string $description = null,
        /** List of Device Insight Tags. */
        public ?string $device_insight_tags = null,
        /** Timestamp of endpoint updation. */
        public ?string $updated_at = null,
    ) {}
}
