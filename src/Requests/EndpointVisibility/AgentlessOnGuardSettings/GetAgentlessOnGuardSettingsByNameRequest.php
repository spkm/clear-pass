<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSettings;

use spkm\ClearPass\Data\EndpointVisibility\AgentlessOnGuardSettings;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an Agentless OnGuard Setting by name: GET /agentless-onguard/settings/name/{name}.
 */
class GetAgentlessOnGuardSettingsByNameRequest extends ItemRequest
{
    protected ?string $dto = AgentlessOnGuardSettings::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/agentless-onguard/settings/name/'.rawurlencode((string) $this->name);
    }
}
