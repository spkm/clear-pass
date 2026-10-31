<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\ProfilerSubnetMapping;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\ProfilerSubnetMapping;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of a profiler subnet mapping: PATCH /profiler-subnet-mapping/{scan_type}/network/{network}.
 */
class UpdateProfilerSubnetMappingByNetworkRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = ProfilerSubnetMapping::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $scanType, protected string $network, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/profiler-subnet-mapping/'.rawurlencode((string) $this->scanType).'/network/'.rawurlencode((string) $this->network);
    }
}
