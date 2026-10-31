<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\ProfilerSubnetMapping;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a profiler subnet mapping: DELETE /profiler-subnet-mapping/{scan_type}/network/{network}.
 */
class DeleteProfilerSubnetMappingByNetworkRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $scanType, protected string $network, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/profiler-subnet-mapping/'.rawurlencode((string) $this->scanType).'/network/'.rawurlencode((string) $this->network);
    }
}
