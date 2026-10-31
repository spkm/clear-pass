<?php

namespace spkm\ClearPass\Resources\EndpointVisibility;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\EndpointVisibility\AgentlessOnGuardSettings;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSettings\CreateAgentlessOnGuardSettingsRequest;
use spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSettings\DeleteAgentlessOnGuardSettingsByNameRequest;
use spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSettings\DeleteAgentlessOnGuardSettingsRequest;
use spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSettings\GetAgentlessOnGuardSettingsByNameRequest;
use spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSettings\GetAgentlessOnGuardSettingsRequest;
use spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSettings\GetAllAgentlessOnGuardSettingsRequest;
use spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSettings\ReplaceAgentlessOnGuardSettingsByNameRequest;
use spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSettings\ReplaceAgentlessOnGuardSettingsRequest;
use spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSettings\UpdateAgentlessOnGuardSettingsByNameRequest;
use spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSettings\UpdateAgentlessOnGuardSettingsRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage Agentless OnGuard settings, from ClearPass::endpointVisibility()->agentlessOnGuardSettings().
 *
 * @extends Builder<AgentlessOnGuardSettings>
 */
class AgentlessOnGuardSettingsResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, AgentlessOnGuardSettings::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAllAgentlessOnGuardSettingsRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateAgentlessOnGuardSettingsRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetAgentlessOnGuardSettingsRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateAgentlessOnGuardSettingsRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceAgentlessOnGuardSettingsRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteAgentlessOnGuardSettingsRequest((int) $id, $options);
    }

    /**
     * Get an Agentless OnGuard Setting by name: GET /agentless-onguard/settings/name/{name}.
     */
    public function findByName(string $name): ?AgentlessOnGuardSettings
    {
        return $this->fetchOrNull(new GetAgentlessOnGuardSettingsByNameRequest($name));
    }

    /**
     * Update some fields of an Agentless OnGuard Setting by name: PATCH /agentless-onguard/settings/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?AgentlessOnGuardSettings
    {
        return $this->fetch(new UpdateAgentlessOnGuardSettingsByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace an Agentless OnGuard Setting by name: PUT /agentless-onguard/settings/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?AgentlessOnGuardSettings
    {
        return $this->fetch(new ReplaceAgentlessOnGuardSettingsByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete an Agentless OnGuard Setting by name: DELETE /agentless-onguard/settings/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteAgentlessOnGuardSettingsByNameRequest($name, $options));

        return true;
    }
}
