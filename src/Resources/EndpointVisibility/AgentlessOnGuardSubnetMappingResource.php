<?php

namespace spkm\ClearPass\Resources\EndpointVisibility;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\EndpointVisibility\AgentlessOnGuardSubnetMapping;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSubnetMapping\CreateAgentlessOnGuardSubnetMappingRequest;
use spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSubnetMapping\DeleteAgentlessOnGuardSubnetMappingByNameRequest;
use spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSubnetMapping\DeleteAgentlessOnGuardSubnetMappingRequest;
use spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSubnetMapping\DisableAgentlessOnGuardSubnetMappingByNameRequest;
use spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSubnetMapping\DisableAgentlessOnGuardSubnetMappingRequest;
use spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSubnetMapping\EnableAgentlessOnGuardSubnetMappingByNameRequest;
use spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSubnetMapping\EnableAgentlessOnGuardSubnetMappingRequest;
use spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSubnetMapping\GetAgentlessOnGuardSubnetMappingByNameRequest;
use spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSubnetMapping\GetAgentlessOnGuardSubnetMappingRequest;
use spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSubnetMapping\GetAgentlessOnGuardSubnetMappingsRequest;
use spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSubnetMapping\ReplaceAgentlessOnGuardSubnetMappingByNameRequest;
use spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSubnetMapping\ReplaceAgentlessOnGuardSubnetMappingRequest;
use spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSubnetMapping\UpdateAgentlessOnGuardSubnetMappingByNameRequest;
use spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSubnetMapping\UpdateAgentlessOnGuardSubnetMappingRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage Agentless OnGuard subnet mappings, from ClearPass::endpointVisibility()->agentlessOnGuardSubnetMappings().
 *
 * @extends Builder<AgentlessOnGuardSubnetMapping>
 */
class AgentlessOnGuardSubnetMappingResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, AgentlessOnGuardSubnetMapping::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAgentlessOnGuardSubnetMappingsRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateAgentlessOnGuardSubnetMappingRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetAgentlessOnGuardSubnetMappingRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateAgentlessOnGuardSubnetMappingRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceAgentlessOnGuardSubnetMappingRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteAgentlessOnGuardSubnetMappingRequest((int) $id, $options);
    }

    /**
     * Get a subnet mapping by name: GET /agentless-onguard/subnet-mapping/name/{name}.
     */
    public function findByName(string $name): ?AgentlessOnGuardSubnetMapping
    {
        return $this->fetchOrNull(new GetAgentlessOnGuardSubnetMappingByNameRequest($name));
    }

    /**
     * Update some fields of a subnet mapping by name: PATCH /agentless-onguard/subnet-mapping/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?AgentlessOnGuardSubnetMapping
    {
        return $this->fetch(new UpdateAgentlessOnGuardSubnetMappingByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a subnet mapping by name: PUT /agentless-onguard/subnet-mapping/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?AgentlessOnGuardSubnetMapping
    {
        return $this->fetch(new ReplaceAgentlessOnGuardSubnetMappingByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a subnet mapping by name: DELETE /agentless-onguard/subnet-mapping/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteAgentlessOnGuardSubnetMappingByNameRequest($name, $options));

        return true;
    }

    /**
     * Enable Agentless OnGuard Settings on client subnets: PATCH /agentless-onguard/subnet-mapping/{subnet_mapping_id}/enable.
     *
     * @param  array<string, mixed>  $options
     */
    public function enable(int $subnetMappingId, array $options = []): ?AgentlessOnGuardSubnetMapping
    {
        return $this->fetch(new EnableAgentlessOnGuardSubnetMappingRequest($subnetMappingId, $options));
    }

    /**
     * Disable Agentless OnGuard Settings on client subnets: PATCH /agentless-onguard/subnet-mapping/{subnet_mapping_id}/disable.
     *
     * @param  array<string, mixed>  $options
     */
    public function disable(int $subnetMappingId, array $options = []): ?AgentlessOnGuardSubnetMapping
    {
        return $this->fetch(new DisableAgentlessOnGuardSubnetMappingRequest($subnetMappingId, $options));
    }

    /**
     * Enable Agentless OnGuard Settings on client subnets by subnet mapping name: PATCH /agentless-onguard/subnet-mapping/name/{name}/enable.
     *
     * @param  array<string, mixed>  $options
     */
    public function enableByName(string $name, array $options = []): ?AgentlessOnGuardSubnetMapping
    {
        return $this->fetch(new EnableAgentlessOnGuardSubnetMappingByNameRequest($name, $options));
    }

    /**
     * Disable Agentless OnGuard Settings on client subnets by subnet mapping name: PATCH /agentless-onguard/subnet-mapping/name/{name}/disable.
     *
     * @param  array<string, mixed>  $options
     */
    public function disableByName(string $name, array $options = []): ?AgentlessOnGuardSubnetMapping
    {
        return $this->fetch(new DisableAgentlessOnGuardSubnetMappingByNameRequest($name, $options));
    }
}
