<?php

namespace spkm\ClearPass\Requests;

use spkm\ClearPass\Query\Query;

/**
 * A list request for a collection the package has no request for, as ClearPass::from('/path'); its records are
 * arrays.
 */
class AdhocListRequest extends ListRequest
{
    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $path, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/'.ltrim($this->path, '/');
    }
}
