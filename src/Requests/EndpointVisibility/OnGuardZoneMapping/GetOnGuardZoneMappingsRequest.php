<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\OnGuardZoneMapping;

use spkm\ClearPass\Data\EndpointVisibility\OnGuardZoneMapping;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get Policy Manager Zones with associated authentication server IP addresses(Client Subnets and Server IPs): GET /onguard/policy-manager-zones.
 */
class GetOnGuardZoneMappingsRequest extends ListRequest
{
    protected ?string $dto = OnGuardZoneMapping::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/onguard/policy-manager-zones';
    }
}
