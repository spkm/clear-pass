<?php

namespace spkm\ClearPass\Resources\PolicyElements;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\PolicyElements\RoleMapping;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ListRequest;
use spkm\ClearPass\Requests\PolicyElements\RoleMapping\CreateRoleMappingRequest;
use spkm\ClearPass\Requests\PolicyElements\RoleMapping\DeleteRoleMappingByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\RoleMapping\DeleteRoleMappingRequest;
use spkm\ClearPass\Requests\PolicyElements\RoleMapping\GetRoleMappingByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\RoleMapping\GetRoleMappingRequest;
use spkm\ClearPass\Requests\PolicyElements\RoleMapping\GetRoleMappingsRequest;
use spkm\ClearPass\Requests\PolicyElements\RoleMapping\ReplaceRoleMappingByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\RoleMapping\ReplaceRoleMappingRequest;
use spkm\ClearPass\Requests\PolicyElements\RoleMapping\UpdateRoleMappingByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\RoleMapping\UpdateRoleMappingRequest;

/**
 * Manage Role Mappings, from ClearPass::policyElements()->roleMappings().
 *
 * @extends Builder<RoleMapping>
 */
class RoleMappingResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, RoleMapping::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetRoleMappingsRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateRoleMappingRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetRoleMappingRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateRoleMappingRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceRoleMappingRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteRoleMappingRequest((int) $id, $options);
    }

    /**
     * Get a role mapping by name: GET /role-mapping/name/{name}.
     */
    public function findByName(string $name): ?RoleMapping
    {
        return $this->fetchOrNull(new GetRoleMappingByNameRequest($name));
    }

    /**
     * Update a role mapping by name: PATCH /role-mapping/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?RoleMapping
    {
        return $this->fetch(new UpdateRoleMappingByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a role mapping by name: PUT /role-mapping/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?RoleMapping
    {
        return $this->fetch(new ReplaceRoleMappingByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a role mapping by name: DELETE /role-mapping/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteRoleMappingByNameRequest($name, $options));

        return true;
    }
}
