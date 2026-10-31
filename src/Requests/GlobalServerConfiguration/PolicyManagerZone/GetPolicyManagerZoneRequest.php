<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\PolicyManagerZone;

use spkm\ClearPass\Data\GlobalServerConfiguration\PolicyManagerZone;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get Policy Manager Zone: GET /server/policy-manager-zones/{zone_id}.
 */
class GetPolicyManagerZoneRequest extends ItemRequest
{
    protected ?string $dto = PolicyManagerZone::class;

    public function __construct(protected int $zoneId) {}

    public function resolveEndpoint(): string
    {
        return '/server/policy-manager-zones/'.$this->zoneId;
    }
}
