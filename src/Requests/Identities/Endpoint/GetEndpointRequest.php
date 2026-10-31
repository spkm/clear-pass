<?php

namespace spkm\ClearPass\Requests\Identities\Endpoint;

use spkm\ClearPass\Data\Identities\Endpoint;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an endpoint: GET /endpoint/{endpoint_id}.
 */
class GetEndpointRequest extends ItemRequest
{
    protected ?string $dto = Endpoint::class;

    public function __construct(protected int $endpointId) {}

    public function resolveEndpoint(): string
    {
        return '/endpoint/'.$this->endpointId;
    }
}
