<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\PolicyManagerZone;

use spkm\ClearPass\Data\GlobalServerConfiguration\PolicyManagerZone;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get Policy Manager Zone by name: GET /server/policy-manager-zones/name/{name}.
 */
class GetPolicyManagerZoneByNameRequest extends ItemRequest
{
    protected ?string $dto = PolicyManagerZone::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/server/policy-manager-zones/name/'.rawurlencode((string) $this->name);
    }
}
