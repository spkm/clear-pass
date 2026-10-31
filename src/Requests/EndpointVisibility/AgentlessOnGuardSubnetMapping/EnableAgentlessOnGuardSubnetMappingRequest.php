<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSubnetMapping;

use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\AgentlessOnGuardSubnetMapping;
use spkm\ClearPass\Requests\ActionRequest;

/**
 * Enable Agentless OnGuard Settings on client subnets: PATCH /agentless-onguard/subnet-mapping/{subnet_mapping_id}/enable.
 */
class EnableAgentlessOnGuardSubnetMappingRequest extends ActionRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = AgentlessOnGuardSubnetMapping::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $subnetMappingId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/agentless-onguard/subnet-mapping/'.$this->subnetMappingId.'/enable';
    }
}
