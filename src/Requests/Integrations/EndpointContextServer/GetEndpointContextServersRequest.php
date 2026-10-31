<?php

namespace spkm\ClearPass\Requests\Integrations\EndpointContextServer;

use spkm\ClearPass\Data\Integrations\EndpointContextServer;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list endpoint context servers: GET /endpoint-context-server.
 */
class GetEndpointContextServersRequest extends ListRequest
{
    protected ?string $dto = EndpointContextServer::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/endpoint-context-server';
    }
}
