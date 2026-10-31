<?php

namespace spkm\ClearPass\Data\PolicyElements;

use Illuminate\Support\Collection;
use spkm\ClearPass\Data\Data;

/**
 * A RADIUSDictionary record.
 */
readonly class RADIUSDictionary extends Data
{
    protected const LISTS = ['attributes' => RADIUSDictionaryAttributes::class];

    /**
     * @param  Collection<int, RADIUSDictionaryAttributes>|null  $attributes
     */
    public function __construct(
        /** Vendor ID of RADIUS Dictionary. */
        public ?int $vendor_id = null,
        /** Vendor Name of RADIUS Dictionary. */
        public ?string $vendor_name = null,
        /** Vendor Prefix of RADIUS Dictionary. */
        public ?string $prefix = null,
        /** Is RADIUS Dictionary enabled?. */
        public ?bool $enabled = null,
        /** Attributes of RADIUS Dictionary. A collection of RADIUSDictionaryAttributes. */
        public ?Collection $attributes = null,
    ) {}
}
