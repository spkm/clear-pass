<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSettings;

use spkm\ClearPass\Data\EndpointVisibility\AgentlessOnGuardSettings;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of Agentless OnGuard Settings: GET /agentless-onguard/settings.
 */
class GetAllAgentlessOnGuardSettingsRequest extends ListRequest
{
    protected ?string $dto = AgentlessOnGuardSettings::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/agentless-onguard/settings';
    }
}
