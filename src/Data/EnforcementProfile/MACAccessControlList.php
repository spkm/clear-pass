<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use Illuminate\Support\Collection;
use spkm\ClearPass\Data\Data;

/**
 * A MACAccessControlList record.
 */
readonly class MACAccessControlList extends Data
{
    protected const LISTS = ['rules' => MACAccessControlListRules::class];

    /**
     * @param  Collection<int, MACAccessControlListRules>|null  $rules
     */
    public function __construct(
        /** Numeric ID of the MAC Access Control List. */
        public ?int $id = null,
        /** Name of the MAC Access Control List. */
        public ?string $name = null,
        /** Rules of the MAC Access Control List. A collection of MACAccessControlListRules. */
        public ?Collection $rules = null,
    ) {}
}
