<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use Illuminate\Support\Collection;
use spkm\ClearPass\Data\Data;

/**
 * A DURClass record.
 */
readonly class DURClass extends Data
{
    protected const LISTS = ['hpe_rules' => HPERules::class, 'aos_cx_rules' => AosCxRules::class];

    /**
     * @param  Collection<int, HPERules>|null  $hpe_rules
     * @param  Collection<int, AosCxRules>|null  $aos_cx_rules
     */
    public function __construct(
        /** Numeric ID of the DUR Class. */
        public ?int $id = null,
        /** Name of the DUR Class. */
        public ?string $name = null,
        /** Traffic of the DUR Class. One of: ipv4, ip, ipv6. */
        public ?string $traffic = null,
        /** Rules for ArubaOS-Switch DUR Class. A collection of HPERules. */
        public ?Collection $hpe_rules = null,
        /** Rules for AOS-CX DUR Class. A collection of AosCxRules. */
        public ?Collection $aos_cx_rules = null,
    ) {}
}
