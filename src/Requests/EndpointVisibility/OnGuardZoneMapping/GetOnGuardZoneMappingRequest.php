<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\OnGuardZoneMapping;

use spkm\ClearPass\Data\EndpointVisibility\OnGuardZoneMapping;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get Client Subnets and Server IPs for Policy Manager Zone: GET /onguard/policy-manager-zones/{policy_manager_zones_id}.
 */
class GetOnGuardZoneMappingRequest extends ItemRequest
{
    protected ?string $dto = OnGuardZoneMapping::class;

    public function __construct(protected int $policyManagerZonesId) {}

    public function resolveEndpoint(): string
    {
        return '/onguard/policy-manager-zones/'.$this->policyManagerZonesId;
    }
}
