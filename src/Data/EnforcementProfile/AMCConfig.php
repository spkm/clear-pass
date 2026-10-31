<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use Illuminate\Support\Collection;
use spkm\ClearPass\Data\Data;

/**
 * A AMCConfig record.
 */
readonly class AMCConfig extends Data
{
    protected const LISTS = ['acl_list' => acl::class];

    /**
     * @param  Collection<int, acl>|null  $acl_list
     */
    public function __construct(
        /** Access Control List. A collection of acl. */
        public ?Collection $acl_list = null,
        /** Captive Portal Profile name. */
        public ?string $captive_portal_profile_name = null,
        /** Parameterized VLAN. */
        public ?string $parameterized_vlan = null,
        /** Re-authentication Interval Time (0-4096). */
        public ?int $reauth_interval = null,
        /** VLAN ID. */
        public ?int $vlan_id = null,
        /** VLAN Name. */
        public ?string $vlan_name = null,
    ) {}
}
