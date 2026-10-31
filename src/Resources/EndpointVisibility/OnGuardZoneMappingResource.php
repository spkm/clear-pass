<?php

namespace spkm\ClearPass\Resources\EndpointVisibility;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\EndpointVisibility\OnGuardZoneMapping;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\EndpointVisibility\OnGuardZoneMapping\CreateOnGuardZoneMappingRequest;
use spkm\ClearPass\Requests\EndpointVisibility\OnGuardZoneMapping\DeleteOnGuardZoneMappingByNameRequest;
use spkm\ClearPass\Requests\EndpointVisibility\OnGuardZoneMapping\DeleteOnGuardZoneMappingRequest;
use spkm\ClearPass\Requests\EndpointVisibility\OnGuardZoneMapping\GetOnGuardZoneMappingByNameRequest;
use spkm\ClearPass\Requests\EndpointVisibility\OnGuardZoneMapping\GetOnGuardZoneMappingRequest;
use spkm\ClearPass\Requests\EndpointVisibility\OnGuardZoneMapping\GetOnGuardZoneMappingsRequest;
use spkm\ClearPass\Requests\EndpointVisibility\OnGuardZoneMapping\ReplaceOnGuardZoneMappingByNameRequest;
use spkm\ClearPass\Requests\EndpointVisibility\OnGuardZoneMapping\ReplaceOnGuardZoneMappingRequest;
use spkm\ClearPass\Requests\EndpointVisibility\OnGuardZoneMapping\UpdateOnGuardZoneMappingByNameRequest;
use spkm\ClearPass\Requests\EndpointVisibility\OnGuardZoneMapping\UpdateOnGuardZoneMappingRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * API's to configure authentication server IP addresses per zone, from ClearPass::endpointVisibility()->onGuardZoneMappings().
 *
 * @extends Builder<OnGuardZoneMapping>
 */
class OnGuardZoneMappingResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, OnGuardZoneMapping::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetOnGuardZoneMappingsRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateOnGuardZoneMappingRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetOnGuardZoneMappingRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateOnGuardZoneMappingRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceOnGuardZoneMappingRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteOnGuardZoneMappingRequest((int) $id, $options);
    }

    /**
     * Get Client Subnets and Server IPs for Policy Manager Zone by name: GET /onguard/policy-manager-zones/name/{name}.
     */
    public function findByName(string $name): ?OnGuardZoneMapping
    {
        return $this->fetchOrNull(new GetOnGuardZoneMappingByNameRequest($name));
    }

    /**
     * Update authentication server IP addresses for Policy Manager Zone by name: PATCH /onguard/policy-manager-zones/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?OnGuardZoneMapping
    {
        return $this->fetch(new UpdateOnGuardZoneMappingByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Post Client Subnets and Server IPs for Policy Manager Zone by name: PUT /onguard/policy-manager-zones/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?OnGuardZoneMapping
    {
        return $this->fetch(new ReplaceOnGuardZoneMappingByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete authentication server IP addresses for Policy Manager Zone by name: DELETE /onguard/policy-manager-zones/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteOnGuardZoneMappingByNameRequest($name, $options));

        return true;
    }
}
