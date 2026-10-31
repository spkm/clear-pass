<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use Illuminate\Support\Collection;
use spkm\ClearPass\Data\Data;

/**
 * A TimeRange record.
 */
readonly class TimeRange extends Data
{
    protected const LISTS = ['rules' => TimeRangeRules::class];

    /**
     * @param  Collection<int, TimeRangeRules>|null  $rules
     */
    public function __construct(
        /** Numeric ID of the Time Range. */
        public ?int $id = null,
        /** Name of the Time Range. */
        public ?string $name = null,
        /** Type of the Time Range. One of: Absolute, Periodic. */
        public ?string $type = null,
        /** Rules of the Time Range. A collection of TimeRangeRules. */
        public ?Collection $rules = null,
    ) {}
}
