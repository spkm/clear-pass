<?php

namespace spkm\ClearPass\Data\Insight;

use spkm\ClearPass\Data\Data;

/**
 * A Report record.
 */
readonly class Report extends Data
{
    /**
     * @param  array<string, mixed>|null  $config
     * @param  array<string, mixed>|null  $email_targets
     * @param  array<string, mixed>|null  $schedule
     * @param  array<string, mixed>|null  $sms_targets
     */
    public function __construct(
        /** Numeric id of the report. */
        public ?int $id = null,
        /** Name of the report. */
        public ?string $name = null,
        /** Category of the report. */
        public ?string $category = null,
        /** Sub category is the template name of the report. */
        public ?string $subcategory = null,
        /** Collect the data for the report from this "begin_dt". */
        public ?int $begin_dt = null,
        /** Setting the report filter configurations & adding CSV columns for the CSV report, e.g. "config": { "filter": { "auth.ap_name": { "operator": "EQUALS", "value": ["..."] }, "cppm_cluster.hostname": { "operator":"CONTAINS", "value":["...", "..."] } }, csv_cols": ["...", "...", "..."] }. */
        public ?array $config = null,
        /** Enable to copy the report to the configured SCP/SFTP server. */
        public ?bool $copy_remote = null,
        /** Description of the report. */
        public ?string $description = null,
        /** Send report to the configured email targets, e.g. "email_targets":["...", "..."]. */
        public ?array $email_targets = null,
        /** Collect the data for the report till this "end_dt". */
        public ?string $end_dt = null,
        /** Enable/Disable the report. */
        public ?bool $is_enabled = null,
        /** Language of the report. */
        public ?string $language = null,
        /** Scheduling the report. Options are [noRepeat, daily, weekly, monthly], e.g. when running the report "now" itself => "schedule": {} - then "begin_dt" & "end_dt" are mandatory, when scheduling the report at "daily" => "schedule": {"freq": "daily", "hour": 12} when scheduling the report at "weekly" => "schedule": {"freq": "weekly", "day": 0, "hour": 12} when scheduling the report at "monthly" => "schedule": {"freq": "monthly", "date": 1, "hour": 12}. */
        public ?array $schedule = null,
        /** Send report to the configured SMS targets, e.g. "sms_targets":["...", "..."]. */
        public ?array $sms_targets = null,
    ) {}
}
