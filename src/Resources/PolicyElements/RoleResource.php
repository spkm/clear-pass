<?php

namespace spkm\ClearPass\Resources\PolicyElements;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\PolicyElements\Role;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ListRequest;
use spkm\ClearPass\Requests\PolicyElements\Role\CreateRoleRequest;
use spkm\ClearPass\Requests\PolicyElements\Role\DeleteRoleByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\Role\DeleteRoleRequest;
use spkm\ClearPass\Requests\PolicyElements\Role\GetRoleByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\Role\GetRoleRequest;
use spkm\ClearPass\Requests\PolicyElements\Role\GetRolesRequest;
use spkm\ClearPass\Requests\PolicyElements\Role\ReplaceRoleByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\Role\ReplaceRoleRequest;
use spkm\ClearPass\Requests\PolicyElements\Role\UpdateRoleByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\Role\UpdateRoleRequest;

/**
 * Manage roles, from ClearPass::policyElements()->roles().
 *
 * @extends Builder<Role>
 */
class RoleResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, Role::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetRolesRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateRoleRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetRoleRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateRoleRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceRoleRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteRoleRequest((int) $id, $options);
    }

    /**
     * Get a role by name: GET /role/name/{name}.
     */
    public function findByName(string $name): ?Role
    {
        return $this->fetchOrNull(new GetRoleByNameRequest($name));
    }

    /**
     * Update some fields of a role by name: PATCH /role/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?Role
    {
        return $this->fetch(new UpdateRoleByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a role by name: PUT /role/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?Role
    {
        return $this->fetch(new ReplaceRoleByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a role by name: DELETE /role/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteRoleByNameRequest($name, $options));

        return true;
    }
}
