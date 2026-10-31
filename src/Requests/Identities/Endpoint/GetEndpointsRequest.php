<?php

namespace spkm\ClearPass\Requests\Identities\Endpoint;

use spkm\ClearPass\Data\Identities\Endpoint;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of endpoints: GET /endpoint.
 */
class GetEndpointsRequest extends ListRequest
{
    protected ?string $dto = Endpoint::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/endpoint';
    }
}
