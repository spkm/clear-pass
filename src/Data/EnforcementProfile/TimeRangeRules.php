<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use spkm\ClearPass\Data\Data;

/**
 * A TimeRangeRules record.
 */
readonly class TimeRangeRules extends Data
{
    public function __construct(
        /** Start day for Periodic Time Range or Start date for Absolute Time Range. One of: Daily, Weekend, Weekday, Sunday, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday. */
        public ?string $start_day_or_date = null,
        /** Start time. */
        public ?string $start_time = null,
        /** End Day for Periodic Time Range or End date for Absolute Time Range. One of: Sunday, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday. */
        public ?string $end_day_or_date = null,
        /** End Time. */
        public ?string $end_time = null,
    ) {}
}
