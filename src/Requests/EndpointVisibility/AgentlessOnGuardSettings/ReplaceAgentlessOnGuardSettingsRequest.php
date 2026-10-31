<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSettings;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\AgentlessOnGuardSettings;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace an Agentless OnGuard Setting: PUT /agentless-onguard/settings/{settings_id}.
 */
class ReplaceAgentlessOnGuardSettingsRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = AgentlessOnGuardSettings::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $settingsId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/agentless-onguard/settings/'.$this->settingsId;
    }
}
