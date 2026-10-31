<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSettings;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an Agentless OnGuard Setting: DELETE /agentless-onguard/settings/{settings_id}.
 */
class DeleteAgentlessOnGuardSettingsRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $settingsId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/agentless-onguard/settings/'.$this->settingsId;
    }
}
