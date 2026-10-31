<?php

namespace spkm\ClearPass\Data\Integrations;

use spkm\ClearPass\Data\Data;

/**
 * A DeviceInsight record.
 */
readonly class DeviceInsight extends Data
{
    public function __construct(
        /** Enable/Disable Device Insight Integration. */
        public ?bool $enable_device_insight = null,
        /** Polling Interval. */
        public ?int $polling_interval = null,
        /** Activation Status. */
        public ?string $activation_status = null,
        /** Activation Timestamp. */
        public ?string $activation_timestamp = null,
        /** Registration Token. */
        public ?string $activation_token = null,
        /** Registration Status. */
        public ?string $registration_status = null,
        /** Last Sync Timestamp. */
        public ?string $last_sync_timestamp = null,
        /** Last Sync Run. */
        public ?string $last_sync_run = null,
        /** Aruba Central Tenant Id. */
        public ?string $aruba_central_tenant_id = null,
        /** Device Insight Collector Id. */
        public ?string $device_insight_collector_id = null,
        /** Analyzer Admin URL. */
        public ?string $analyzer_admin_url = null,
        /** Activation Error. */
        public ?string $activation_error = null,
        /** Bypass Proxy. */
        public ?bool $bypass_proxy = null,
        /** Primary ClearPass Server UUID. */
        public ?string $primary_clearpass_server_uuid = null,
        /** Radius CoA action. */
        public ?string $radius_coa_action = null,
        /** null. */
        public ?string $standby_clearpass_server_uuid = null,
        /** Sync Time. */
        public ?int $sync_time = null,
        /** Tags Update Action. One of: NONE, ANY, SELECTED. */
        public ?string $tag_update_action = null,
        /** Tags for Disconnect. */
        public ?string $tags_for_disconnect = null,
    ) {}
}
