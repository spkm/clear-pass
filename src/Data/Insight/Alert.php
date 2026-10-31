<?php

namespace spkm\ClearPass\Data\Insight;

use spkm\ClearPass\Data\Data;

/**
 * A Alert record.
 */
readonly class Alert extends Data
{
    /**
     * @param  array<string, mixed>|null  $email_targets
     * @param  array<string, mixed>|null  $config
     * @param  array<string, mixed>|null  $sms_targets
     */
    public function __construct(
        /** Numeric id of the alert. */
        public ?int $id = null,
        /** Name of the alert. */
        public ?string $name = null,
        /** Category of the alert. */
        public ?string $category = null,
        /** Sub category is the template name of the alert. */
        public ?string $subcategory = null,
        /** Send alert notification to the configured email targets, e.g. "email_targets":["...", "..."]. */
        public ?array $email_targets = null,
        /** Severity of the alert, either "critical" or "warning". */
        public ?string $severity = null,
        /** Triggering the alert when reaching the specified numeric threshold value. */
        public ?int $threshold = null,
        /** Triggering the alert at the numeric interval. */
        public ?int $interval = null,
        /** Interval units either "minute" or "hour". */
        public ?string $interval_unit = null,
        /** Setting the alert filter configurations & adding CSV columns for the CSV report, e.g. "config": { "filter": { "auth.ap_name": { "operator": "EQUALS", "value": ["..."] }, "cppm_cluster.hostname": { "operator":"CONTAINS", "value":["...", "..."] } } }. */
        public ?array $config = null,
        /** Description of the alert. */
        public ?string $description = null,
        /** Enable/Disable the alert. */
        public ?bool $is_enabled = null,
        /** Mute/Unmute the alert. */
        public ?bool $is_muted = null,
        /** Send alert notification to the configured SMS targets, e.g. "sms_targets":["...", "..."]. */
        public ?array $sms_targets = null,
    ) {}
}
