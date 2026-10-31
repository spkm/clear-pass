<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\ProfilerSubnetMapping;

use spkm\ClearPass\Data\EndpointVisibility\ProfilerSubnetMapping;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a profiler subnet mapping: GET /profiler-subnet-mapping/{scan_type}/{profiler_subnet_mapping_id}.
 */
class GetProfilerSubnetMappingByScanTypeRequest extends ItemRequest
{
    protected ?string $dto = ProfilerSubnetMapping::class;

    public function __construct(protected string $scanType, protected int $profilerSubnetMappingId) {}

    public function resolveEndpoint(): string
    {
        return '/profiler-subnet-mapping/'.rawurlencode((string) $this->scanType).'/'.$this->profilerSubnetMappingId;
    }
}
