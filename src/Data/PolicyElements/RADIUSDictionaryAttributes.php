<?php

namespace spkm\ClearPass\Data\PolicyElements;

use Illuminate\Support\Collection;
use spkm\ClearPass\Data\Data;

/**
 * A RADIUSDictionaryAttributes record.
 */
readonly class RADIUSDictionaryAttributes extends Data
{
    protected const LISTS = ['valid_values' => ValidValue::class];

    /**
     * @param  Collection<int, ValidValue>|null  $valid_values
     */
    public function __construct(
        /** RADIUS Dictionary Attribute ID. */
        public ?int $attr_id = null,
        /** RADIUS Dictionary Attribute Name. */
        public ?string $attr_name = null,
        /** RADIUS Dictionary Attribute Type. */
        public ?string $attr_type = null,
        /** ["in" or "out" or "in out"] RADIUS Dictionary Attribute Profile. */
        public ?string $attr_profile = null,
        /** RADIUS Dictionary Attribute Extra Data. */
        public ?string $extra_data = null,
        /** RADIUS Dictionary Attribute Valid Values. A collection of ValidValue. */
        public ?Collection $valid_values = null,
    ) {}
}
