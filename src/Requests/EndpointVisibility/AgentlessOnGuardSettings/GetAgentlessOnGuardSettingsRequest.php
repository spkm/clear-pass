<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSettings;

use spkm\ClearPass\Data\EndpointVisibility\AgentlessOnGuardSettings;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an Agentless OnGuard Setting: GET /agentless-onguard/settings/{settings_id}.
 */
class GetAgentlessOnGuardSettingsRequest extends ItemRequest
{
    protected ?string $dto = AgentlessOnGuardSettings::class;

    public function __construct(protected int $settingsId) {}

    public function resolveEndpoint(): string
    {
        return '/agentless-onguard/settings/'.$this->settingsId;
    }
}
