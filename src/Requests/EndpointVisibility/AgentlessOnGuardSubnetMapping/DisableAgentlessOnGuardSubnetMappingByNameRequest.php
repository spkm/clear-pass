<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSubnetMapping;

use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\AgentlessOnGuardSubnetMapping;
use spkm\ClearPass\Requests\ActionRequest;

/**
 * Disable Agentless OnGuard Settings on client subnets by subnet mapping name: PATCH /agentless-onguard/subnet-mapping/name/{name}/disable.
 */
class DisableAgentlessOnGuardSubnetMappingByNameRequest extends ActionRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = AgentlessOnGuardSubnetMapping::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/agentless-onguard/subnet-mapping/name/'.rawurlencode((string) $this->name).'/disable';
    }
}
