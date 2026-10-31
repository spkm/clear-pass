<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use Illuminate\Support\Collection;
use spkm\ClearPass\Data\Data;

/**
 * A MASConfig record.
 */
readonly class MASConfig extends Data
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
        /** Policer Profile name. */
        public ?string $policer_profile_name = null,
        /** QoS Profile name. */
        public ?string $qos_profile_name = null,
        /** Re-authentication Interval Time (0-4096). */
        public ?int $reauth_interval = null,
        /** VLAN ID. */
        public ?int $vlan_id = null,
        /** VoIP Profile name. */
        public ?string $voip_profile_name = null,
    ) {}
}
