<?php

namespace spkm\ClearPass\Resources\EnforcementProfile;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\EnforcementProfile\NetService;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NetService\CreateNetServiceRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NetService\DeleteNetServiceByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NetService\DeleteNetServiceRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NetService\GetNetServiceByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NetService\GetNetServiceRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NetService\GetNetServicesRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NetService\ReplaceNetServiceByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NetService\ReplaceNetServiceRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NetService\UpdateNetServiceByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NetService\UpdateNetServiceRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage Net Services, from ClearPass::enforcementProfile()->netServices().
 *
 * @extends Builder<NetService>
 */
class NetServiceResource extends Builder
{
    public function __construct(ClearPassConnector $connector, protected string $productName)
    {
        parent::__construct($connector, NetService::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetNetServicesRequest($this->productName, $query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateNetServiceRequest($this->productName, $body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetNetServiceRequest($this->productName, (int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateNetServiceRequest($this->productName, (int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceNetServiceRequest($this->productName, (int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteNetServiceRequest($this->productName, (int) $id, $options);
    }

    /**
     * Get a Net Service by name: GET /enforcement-profile-dur/net-service/{product_name}/name/{name}.
     */
    public function findByName(string $name): ?NetService
    {
        return $this->fetchOrNull(new GetNetServiceByNameRequest($this->productName, $name));
    }

    /**
     * Update some fields of a Net Service by name: PATCH /enforcement-profile-dur/net-service/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?NetService
    {
        return $this->fetch(new UpdateNetServiceByNameRequest($this->productName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a Net Service by name: PUT /enforcement-profile-dur/net-service/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?NetService
    {
        return $this->fetch(new ReplaceNetServiceByNameRequest($this->productName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a Net Service by name: DELETE /enforcement-profile-dur/net-service/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteNetServiceByNameRequest($this->productName, $name, $options));

        return true;
    }
}
