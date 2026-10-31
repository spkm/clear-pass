<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use Illuminate\Support\Collection;
use spkm\ClearPass\Data\Data;

/**
 * A EthertypeAccessControlList record.
 */
readonly class EthertypeAccessControlList extends Data
{
    protected const LISTS = ['rules' => EthertypeAccessControlListRules::class];

    /**
     * @param  Collection<int, EthertypeAccessControlListRules>|null  $rules
     */
    public function __construct(
        /** Numeric ID of the Ethertype Access Control List. */
        public ?int $id = null,
        /** Name of the Ethertype Access Control List. */
        public ?string $name = null,
        /** Rules of the Ethertype Access Control List. A collection of EthertypeAccessControlListRules. */
        public ?Collection $rules = null,
    ) {}
}
