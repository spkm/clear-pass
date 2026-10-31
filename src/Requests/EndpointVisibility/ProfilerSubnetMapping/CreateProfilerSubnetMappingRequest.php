<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\ProfilerSubnetMapping;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\ProfilerSubnetMapping;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Add a profiler subnet mapping: POST /profiler-subnet-mapping.
 */
class CreateProfilerSubnetMappingRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = ProfilerSubnetMapping::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/profiler-subnet-mapping';
    }
}
