<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSubnetMapping;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\AgentlessOnGuardSubnetMapping;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a subnet mapping: PUT /agentless-onguard/subnet-mapping/{subnet_mapping_id}.
 */
class ReplaceAgentlessOnGuardSubnetMappingRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = AgentlessOnGuardSubnetMapping::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $subnetMappingId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/agentless-onguard/subnet-mapping/'.$this->subnetMappingId;
    }
}
