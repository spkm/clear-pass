<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\DataFilter;

use spkm\ClearPass\Data\GlobalServerConfiguration\DataFilter;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of data filters: GET /data-filter.
 */
class GetDataFiltersRequest extends ListRequest
{
    protected ?string $dto = DataFilter::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/data-filter';
    }
}
