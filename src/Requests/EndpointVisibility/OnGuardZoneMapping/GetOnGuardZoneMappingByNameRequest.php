<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\OnGuardZoneMapping;

use spkm\ClearPass\Data\EndpointVisibility\OnGuardZoneMapping;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get Client Subnets and Server IPs for Policy Manager Zone by name: GET /onguard/policy-manager-zones/name/{name}.
 */
class GetOnGuardZoneMappingByNameRequest extends ItemRequest
{
    protected ?string $dto = OnGuardZoneMapping::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/onguard/policy-manager-zones/name/'.rawurlencode((string) $this->name);
    }
}
