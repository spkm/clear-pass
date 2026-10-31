<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSubnetMapping;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\AgentlessOnGuardSubnetMapping;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Add a subnet mapping: POST /agentless-onguard/subnet-mapping.
 */
class CreateAgentlessOnGuardSubnetMappingRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = AgentlessOnGuardSubnetMapping::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/agentless-onguard/subnet-mapping';
    }
}
