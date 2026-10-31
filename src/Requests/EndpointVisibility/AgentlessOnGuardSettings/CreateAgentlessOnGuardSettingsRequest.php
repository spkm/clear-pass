<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSettings;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\AgentlessOnGuardSettings;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Add an Agentless OnGuard Setting: POST /agentless-onguard/settings.
 */
class CreateAgentlessOnGuardSettingsRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = AgentlessOnGuardSettings::class;

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
        return '/agentless-onguard/settings';
    }
}
