<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use Illuminate\Support\Collection;
use spkm\ClearPass\Data\Data;

/**
 * A NetDestination record.
 */
readonly class NetDestination extends Data
{
    protected const LISTS = ['rules' => NetDestinationRules::class];

    /**
     * @param  Collection<int, NetDestinationRules>|null  $rules
     */
    public function __construct(
        /** Numeric ID of the Net Destination. */
        public ?int $id = null,
        /** Name of the Net Destination. */
        public ?string $name = null,
        /** Invert for Mobility Access Switch and Mobility Controller Net Destination. */
        public ?bool $invert = null,
        /** Rules for the Net Destination. A collection of NetDestinationRules. */
        public ?Collection $rules = null,
    ) {}
}
