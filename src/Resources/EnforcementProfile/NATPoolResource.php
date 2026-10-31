<?php

namespace spkm\ClearPass\Resources\EnforcementProfile;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\EnforcementProfile\NATPool;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NATPool\CreateNATPoolRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NATPool\DeleteNATPoolByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NATPool\DeleteNATPoolRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NATPool\GetNATPoolByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NATPool\GetNATPoolRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NATPool\GetNATPoolsRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NATPool\ReplaceNATPoolByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NATPool\ReplaceNATPoolRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NATPool\UpdateNATPoolByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NATPool\UpdateNATPoolRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage NAT Pool, from ClearPass::enforcementProfile()->natPools().
 *
 * @extends Builder<NATPool>
 */
class NATPoolResource extends Builder
{
    public function __construct(ClearPassConnector $connector, protected string $productName)
    {
        parent::__construct($connector, NATPool::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetNATPoolsRequest($this->productName, $query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateNATPoolRequest($this->productName, $body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetNATPoolRequest($this->productName, (int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateNATPoolRequest($this->productName, (int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceNATPoolRequest($this->productName, (int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteNATPoolRequest($this->productName, (int) $id, $options);
    }

    /**
     * Get a NAT Pool by name: GET /enforcement-profile-dur/nat-pool/{product_name}/name/{name}.
     */
    public function findByName(string $name): ?NATPool
    {
        return $this->fetchOrNull(new GetNATPoolByNameRequest($this->productName, $name));
    }

    /**
     * Update some fields of a NAT Pool by name: PATCH /enforcement-profile-dur/nat-pool/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?NATPool
    {
        return $this->fetch(new UpdateNATPoolByNameRequest($this->productName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a NAT Pool by name: PUT /enforcement-profile-dur/nat-pool/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?NATPool
    {
        return $this->fetch(new ReplaceNATPoolByNameRequest($this->productName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a NAT Pool by name: DELETE /enforcement-profile-dur/nat-pool/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteNATPoolByNameRequest($this->productName, $name, $options));

        return true;
    }
}
