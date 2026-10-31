<?php

namespace spkm\ClearPass\Resources\EndpointVisibility;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\EndpointVisibility\ProfilerSubnetMapping;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\EndpointVisibility\ProfilerSubnetMapping\CreateProfilerSubnetMappingRequest;
use spkm\ClearPass\Requests\EndpointVisibility\ProfilerSubnetMapping\DeleteProfilerSubnetMappingByNetworkRequest;
use spkm\ClearPass\Requests\EndpointVisibility\ProfilerSubnetMapping\DeleteProfilerSubnetMappingByScanTypeRequest;
use spkm\ClearPass\Requests\EndpointVisibility\ProfilerSubnetMapping\GetProfilerSubnetMappingByNetworkRequest;
use spkm\ClearPass\Requests\EndpointVisibility\ProfilerSubnetMapping\GetProfilerSubnetMappingByScanTypeRequest;
use spkm\ClearPass\Requests\EndpointVisibility\ProfilerSubnetMapping\GetProfilerSubnetMappingsRequest;
use spkm\ClearPass\Requests\EndpointVisibility\ProfilerSubnetMapping\ReplaceProfilerSubnetMappingByNetworkRequest;
use spkm\ClearPass\Requests\EndpointVisibility\ProfilerSubnetMapping\ReplaceProfilerSubnetMappingByScanTypeRequest;
use spkm\ClearPass\Requests\EndpointVisibility\ProfilerSubnetMapping\UpdateProfilerSubnetMappingByNetworkRequest;
use spkm\ClearPass\Requests\EndpointVisibility\ProfilerSubnetMapping\UpdateProfilerSubnetMappingByScanTypeRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage profiler subnet mappings, from ClearPass::endpointVisibility()->profilerSubnetMappings().
 *
 * @extends Builder<ProfilerSubnetMapping>
 */
class ProfilerSubnetMappingResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, ProfilerSubnetMapping::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetProfilerSubnetMappingsRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateProfilerSubnetMappingRequest($body, $options);
    }

    /**
     * Get a profiler subnet mapping: GET /profiler-subnet-mapping/{scan_type}/{profiler_subnet_mapping_id}.
     */
    public function findByScanType(string $scanType, int $profilerSubnetMappingId): ?ProfilerSubnetMapping
    {
        return $this->fetchOrNull(new GetProfilerSubnetMappingByScanTypeRequest($scanType, $profilerSubnetMappingId));
    }

    /**
     * Update some fields of a profiler subnet mapping: PATCH /profiler-subnet-mapping/{scan_type}/{profiler_subnet_mapping_id}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByScanType(string $scanType, int $profilerSubnetMappingId, array|Data $attributes = [], array $options = []): ?ProfilerSubnetMapping
    {
        return $this->fetch(new UpdateProfilerSubnetMappingByScanTypeRequest($scanType, $profilerSubnetMappingId, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a profiler subnet mapping: PUT /profiler-subnet-mapping/{scan_type}/{profiler_subnet_mapping_id}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByScanType(string $scanType, int $profilerSubnetMappingId, array|Data $attributes = [], array $options = []): ?ProfilerSubnetMapping
    {
        return $this->fetch(new ReplaceProfilerSubnetMappingByScanTypeRequest($scanType, $profilerSubnetMappingId, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a profiler subnet mapping: DELETE /profiler-subnet-mapping/{scan_type}/{profiler_subnet_mapping_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByScanType(string $scanType, int $profilerSubnetMappingId, array $options = []): bool
    {
        $this->fetch(new DeleteProfilerSubnetMappingByScanTypeRequest($scanType, $profilerSubnetMappingId, $options));

        return true;
    }

    /**
     * Get a profiler subnet mapping: GET /profiler-subnet-mapping/{scan_type}/network/{network}.
     */
    public function findByNetwork(string $scanType, string $network): ?ProfilerSubnetMapping
    {
        return $this->fetchOrNull(new GetProfilerSubnetMappingByNetworkRequest($scanType, $network));
    }

    /**
     * Update some fields of a profiler subnet mapping: PATCH /profiler-subnet-mapping/{scan_type}/network/{network}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByNetwork(string $scanType, string $network, array|Data $attributes = [], array $options = []): ?ProfilerSubnetMapping
    {
        return $this->fetch(new UpdateProfilerSubnetMappingByNetworkRequest($scanType, $network, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a profiler subnet mapping: PUT /profiler-subnet-mapping/{scan_type}/network/{network}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByNetwork(string $scanType, string $network, array|Data $attributes = [], array $options = []): ?ProfilerSubnetMapping
    {
        return $this->fetch(new ReplaceProfilerSubnetMappingByNetworkRequest($scanType, $network, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a profiler subnet mapping: DELETE /profiler-subnet-mapping/{scan_type}/network/{network}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByNetwork(string $scanType, string $network, array $options = []): bool
    {
        $this->fetch(new DeleteProfilerSubnetMappingByNetworkRequest($scanType, $network, $options));

        return true;
    }
}
