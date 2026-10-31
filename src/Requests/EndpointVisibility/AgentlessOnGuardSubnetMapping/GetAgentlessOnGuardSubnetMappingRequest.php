<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSubnetMapping;

use spkm\ClearPass\Data\EndpointVisibility\AgentlessOnGuardSubnetMapping;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a subnet mapping: GET /agentless-onguard/subnet-mapping/{subnet_mapping_id}.
 */
class GetAgentlessOnGuardSubnetMappingRequest extends ItemRequest
{
    protected ?string $dto = AgentlessOnGuardSubnetMapping::class;

    public function __construct(protected int $subnetMappingId) {}

    public function resolveEndpoint(): string
    {
        return '/agentless-onguard/subnet-mapping/'.$this->subnetMappingId;
    }
}
