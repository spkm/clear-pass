<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use Illuminate\Support\Collection;
use spkm\ClearPass\Data\Data;

/**
 * A SessionAccessControlList record.
 */
readonly class SessionAccessControlList extends Data
{
    protected const LISTS = ['rules' => SessionAccessControlListRules::class];

    /**
     * @param  Collection<int, SessionAccessControlListRules>|null  $rules
     */
    public function __construct(
        /** Numeric ID of the Session Access Control List. */
        public ?int $id = null,
        /** Name of the Session Access Control List. */
        public ?string $name = null,
        /** Rules of the Session Access Control List. A collection of SessionAccessControlListRules. */
        public ?Collection $rules = null,
    ) {}
}
