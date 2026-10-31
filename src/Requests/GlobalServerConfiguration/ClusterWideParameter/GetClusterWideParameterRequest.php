<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\ClusterWideParameter;

use spkm\ClearPass\Data\GlobalServerConfiguration\ClusterWideParameter;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get cluster wide parameters: GET /cluster/parameters.
 */
class GetClusterWideParameterRequest extends ItemRequest
{
    protected ?string $dto = ClusterWideParameter::class;

    public function resolveEndpoint(): string
    {
        return '/cluster/parameters';
    }
}
