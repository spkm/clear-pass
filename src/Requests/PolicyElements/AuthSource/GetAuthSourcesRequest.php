<?php

namespace spkm\ClearPass\Requests\PolicyElements\AuthSource;

use spkm\ClearPass\Data\PolicyElements\AuthSource;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of authentication sources: GET /auth-source.
 */
class GetAuthSourcesRequest extends ListRequest
{
    protected ?string $dto = AuthSource::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/auth-source';
    }
}
