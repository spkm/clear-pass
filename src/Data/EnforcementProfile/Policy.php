<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use Illuminate\Support\Collection;
use spkm\ClearPass\Data\Data;

/**
 * A Policy record.
 */
readonly class Policy extends Data
{
    protected const LISTS = ['rules' => PolicyRules::class];

    /**
     * @param  Collection<int, PolicyRules>|null  $rules
     */
    public function __construct(
        /** Numeric ID of the Policy. */
        public ?int $id = null,
        /** Name of the Policy. */
        public ?string $name = null,
        /** Rules of the Policy. A collection of PolicyRules. */
        public ?Collection $rules = null,
    ) {}
}
