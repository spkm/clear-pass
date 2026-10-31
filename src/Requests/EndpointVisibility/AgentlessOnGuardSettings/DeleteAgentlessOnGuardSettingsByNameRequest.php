<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSettings;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an Agentless OnGuard Setting by name: DELETE /agentless-onguard/settings/name/{name}.
 */
class DeleteAgentlessOnGuardSettingsByNameRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/agentless-onguard/settings/name/'.rawurlencode((string) $this->name);
    }
}
