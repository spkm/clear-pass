<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\OnGuardZoneMapping;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\OnGuardZoneMapping;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update authentication server IP addresses for Policy Manager Zone: PATCH /onguard/policy-manager-zones/{policy_manager_zones_id}.
 */
class UpdateOnGuardZoneMappingRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = OnGuardZoneMapping::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $policyManagerZonesId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/onguard/policy-manager-zones/'.$this->policyManagerZonesId;
    }
}
