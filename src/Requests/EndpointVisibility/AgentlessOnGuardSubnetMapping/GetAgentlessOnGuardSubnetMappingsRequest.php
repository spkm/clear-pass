<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSubnetMapping;

use spkm\ClearPass\Data\EndpointVisibility\AgentlessOnGuardSubnetMapping;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of subnet mappings: GET /agentless-onguard/subnet-mapping.
 */
class GetAgentlessOnGuardSubnetMappingsRequest extends ListRequest
{
    protected ?string $dto = AgentlessOnGuardSubnetMapping::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/agentless-onguard/subnet-mapping';
    }
}
