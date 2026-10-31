<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use Illuminate\Support\Collection;
use spkm\ClearPass\Data\Data;

/**
 * A StatelessAccessControlList record.
 */
readonly class StatelessAccessControlList extends Data
{
    protected const LISTS = ['rules' => StatelessAccessControlListRules::class];

    /**
     * @param  Collection<int, StatelessAccessControlListRules>|null  $rules
     */
    public function __construct(
        /** Numeric ID of the Stateless Access Control List. */
        public ?int $id = null,
        /** Name of the Stateless Access Control List. */
        public ?string $name = null,
        /** Rules of the Stateless Access Control List. A collection of StatelessAccessControlListRules. */
        public ?Collection $rules = null,
    ) {}
}
