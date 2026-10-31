<?php

namespace spkm\ClearPass\Requests\LocalServerConfiguration\ServerConfiguration;

use spkm\ClearPass\Data\LocalServerConfiguration\ServerConfiguration;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of servers in the cluster: GET /cluster/server.
 */
class GetServerConfigurationsRequest extends ListRequest
{
    protected ?string $dto = ServerConfiguration::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/cluster/server';
    }
}
