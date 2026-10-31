<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\ProfilerSubnetMapping;

use spkm\ClearPass\Data\EndpointVisibility\ProfilerSubnetMapping;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a profiler subnet mapping: GET /profiler-subnet-mapping/{scan_type}/network/{network}.
 */
class GetProfilerSubnetMappingByNetworkRequest extends ItemRequest
{
    protected ?string $dto = ProfilerSubnetMapping::class;

    public function __construct(protected string $scanType, protected string $network) {}

    public function resolveEndpoint(): string
    {
        return '/profiler-subnet-mapping/'.rawurlencode((string) $this->scanType).'/network/'.rawurlencode((string) $this->network);
    }
}
