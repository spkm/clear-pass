<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\AgentlessOnGuardSettings;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\AgentlessOnGuardSettings;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace an Agentless OnGuard Setting by name: PUT /agentless-onguard/settings/name/{name}.
 */
class ReplaceAgentlessOnGuardSettingsByNameRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = AgentlessOnGuardSettings::class;

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
        return '/agentless-onguard/settings/name/'.rawurlencode((string) $this->name);
    }
}
