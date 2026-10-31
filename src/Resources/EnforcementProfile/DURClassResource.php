<?php

namespace spkm\ClearPass\Resources\EnforcementProfile;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\EnforcementProfile\DURClass;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\EnforcementProfile\DURClass\CreateDURClassRequest;
use spkm\ClearPass\Requests\EnforcementProfile\DURClass\DeleteDURClassByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\DURClass\DeleteDURClassRequest;
use spkm\ClearPass\Requests\EnforcementProfile\DURClass\GetDURClassByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\DURClass\GetDURClassesRequest;
use spkm\ClearPass\Requests\EnforcementProfile\DURClass\GetDURClassRequest;
use spkm\ClearPass\Requests\EnforcementProfile\DURClass\ReplaceDURClassByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\DURClass\ReplaceDURClassRequest;
use spkm\ClearPass\Requests\EnforcementProfile\DURClass\UpdateDURClassByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\DURClass\UpdateDURClassRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage DUR Class, from ClearPass::enforcementProfile()->durClasses().
 *
 * @extends Builder<DURClass>
 */
class DURClassResource extends Builder
{
    public function __construct(ClearPassConnector $connector, protected string $productName)
    {
        parent::__construct($connector, DURClass::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetDURClassesRequest($this->productName, $query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateDURClassRequest($this->productName, $body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetDURClassRequest($this->productName, (int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateDURClassRequest($this->productName, (int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceDURClassRequest($this->productName, (int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteDURClassRequest($this->productName, (int) $id, $options);
    }

    /**
     * Get a DUR Class by name: GET /enforcement-profile-dur/dur-class/{product_name}/name/{name}.
     */
    public function findByName(string $name): ?DURClass
    {
        return $this->fetchOrNull(new GetDURClassByNameRequest($this->productName, $name));
    }

    /**
     * Update a DUR Class by name: PATCH /enforcement-profile-dur/dur-class/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?DURClass
    {
        return $this->fetch(new UpdateDURClassByNameRequest($this->productName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a DUR Class by name: PUT /enforcement-profile-dur/dur-class/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?DURClass
    {
        return $this->fetch(new ReplaceDURClassByNameRequest($this->productName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a DUR Class by name: DELETE /enforcement-profile-dur/dur-class/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteDURClassByNameRequest($this->productName, $name, $options));

        return true;
    }
}
