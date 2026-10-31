<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\ProfilerSubnetMapping;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\ProfilerSubnetMapping;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of a profiler subnet mapping: PATCH /profiler-subnet-mapping/{scan_type}/{profiler_subnet_mapping_id}.
 */
class UpdateProfilerSubnetMappingByScanTypeRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

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
