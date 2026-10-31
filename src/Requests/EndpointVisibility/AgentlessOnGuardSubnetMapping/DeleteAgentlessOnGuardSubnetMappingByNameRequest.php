<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSubnetMapping;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a subnet mapping by name: DELETE /agentless-onguard/subnet-mapping/name/{name}.
 */
class DeleteAgentlessOnGuardSubnetMappingByNameRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/agentless-onguard/subnet-mapping/name/'.rawurlencode((string) $this->name);
    }
}
