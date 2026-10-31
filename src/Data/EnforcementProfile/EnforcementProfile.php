<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use Illuminate\Support\Collection;
use spkm\ClearPass\Data\Data;

/**
 * A EnforcementProfile record.
 */
readonly class EnforcementProfile extends Data
{
    protected const LISTS = ['attributes' => Attributes::class];

    /**
     * @param  Collection<int, Attributes>|null  $attributes
     * @param  array<int, string>|null  $device_group_list
     */
    public function __construct(
        /** Numeric ID of the Enforcement Profile. */
        public ?int $id = null,
        /** Name of the Enforcement Profile. */
        public ?string $name = null,
        /** Enforcement Profile Type. One of: RADIUS, TACACS, SNMP, Application, Agent, CLI, HTTP, RADIUS_DynAuthZ, Post_Authentication, Aruba_DUR. */
        public ?string $type = null,
        /** Enforcement Profile Action. One of: Accept, Reject, Drop. */
        public ?string $action = null,
        /** Agent Enforcement Profile Template. One of: Agent, AgentScript. */
        public ?string $agent_template = null,
        /** Attributes. A collection of Attributes. */
        public ?Collection $attributes = null,
        /** Description of the Enforcement Profile. */
        public ?string $description = null,
        /** Device Group List. */
        public ?array $device_group_list = null,
        /** Downloadable User Role Configuration. */
        public ?DURConfig $dur_config = null,
        /** Post Authentication Enforcement Profile Template. One of: EntityUpdate, SessionRestriction, SessionNotify. */
        public ?string $post_auth_template = null,
        /** Post Authentication Enforcement Profile Template. */
        public ?string $radius_dyn_authz_template = null,
        /** Tacacs+ Service Params. */
        public ?TacacsServiceParam $tacacs_service_params = null,
    ) {}
}
