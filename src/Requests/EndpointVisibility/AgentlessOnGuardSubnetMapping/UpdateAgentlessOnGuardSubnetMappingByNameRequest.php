<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSubnetMapping;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\AgentlessOnGuardSubnetMapping;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of a subnet mapping by name: PATCH /agentless-onguard/subnet-mapping/name/{name}.
 */
class UpdateAgentlessOnGuardSubnetMappingByNameRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = AgentlessOnGuardSubnetMapping::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/agentless-onguard/subnet-mapping/name/'.rawurlencode((string) $this->name);
    }
}
