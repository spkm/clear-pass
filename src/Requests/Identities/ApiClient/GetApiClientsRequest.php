<?php

namespace spkm\ClearPass\Requests\Identities\ApiClient;

use spkm\ClearPass\Data\Identities\ApiClient;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of API clients: GET /api-client.
 */
class GetApiClientsRequest extends ListRequest
{
    protected ?string $dto = ApiClient::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/api-client';
    }
}
