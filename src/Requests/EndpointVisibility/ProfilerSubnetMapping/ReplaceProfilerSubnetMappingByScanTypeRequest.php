<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\ProfilerSubnetMapping;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\ProfilerSubnetMapping;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a profiler subnet mapping: PUT /profiler-subnet-mapping/{scan_type}/{profiler_subnet_mapping_id}.
 */
class ReplaceProfilerSubnetMappingByScanTypeRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = ProfilerSubnetMapping::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $scanType, protected int $profilerSubnetMappingId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/profiler-subnet-mapping/'.rawurlencode((string) $this->scanType).'/'.$this->profilerSubnetMappingId;
    }
}
