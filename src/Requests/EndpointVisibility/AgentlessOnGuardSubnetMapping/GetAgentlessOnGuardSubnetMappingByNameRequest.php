<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSubnetMapping;

use spkm\ClearPass\Data\EndpointVisibility\AgentlessOnGuardSubnetMapping;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a subnet mapping by name: GET /agentless-onguard/subnet-mapping/name/{name}.
 */
class GetAgentlessOnGuardSubnetMappingByNameRequest extends ItemRequest
{
    protected ?string $dto = AgentlessOnGuardSubnetMapping::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/agentless-onguard/subnet-mapping/name/'.rawurlencode((string) $this->name);
    }
}
