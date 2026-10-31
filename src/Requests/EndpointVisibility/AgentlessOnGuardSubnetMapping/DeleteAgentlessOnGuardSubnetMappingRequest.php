<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSubnetMapping;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a subnet mapping: DELETE /agentless-onguard/subnet-mapping/{subnet_mapping_id}.
 */
class DeleteAgentlessOnGuardSubnetMappingRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $subnetMappingId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/agentless-onguard/subnet-mapping/'.$this->subnetMappingId;
    }
}
