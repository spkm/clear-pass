<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\ProfilerSubnetMapping;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a profiler subnet mapping: DELETE /profiler-subnet-mapping/{scan_type}/{profiler_subnet_mapping_id}.
 */
class DeleteProfilerSubnetMappingByScanTypeRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $scanType, protected int $profilerSubnetMappingId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/profiler-subnet-mapping/'.rawurlencode((string) $this->scanType).'/'.$this->profilerSubnetMappingId;
    }
}
