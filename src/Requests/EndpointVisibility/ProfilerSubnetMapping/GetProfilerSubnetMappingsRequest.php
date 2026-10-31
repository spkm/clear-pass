<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\ProfilerSubnetMapping;

use spkm\ClearPass\Data\EndpointVisibility\ProfilerSubnetMapping;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of profiler subnet mappings: GET /profiler-subnet-mapping.
 */
class GetProfilerSubnetMappingsRequest extends ListRequest
{
    protected ?string $dto = ProfilerSubnetMapping::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/profiler-subnet-mapping';
    }
}
