<?php

namespace spkm\ClearPass\Resources\GlobalServerConfiguration;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\GlobalServerConfiguration\AdminPrivilege;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\AdminPrivilege\CreateAdminPrivilegeRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\AdminPrivilege\DeleteAdminPrivilegeByNameRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\AdminPrivilege\DeleteAdminPrivilegeRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\AdminPrivilege\GetAdminPrivilegeByNameRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\AdminPrivilege\GetAdminPrivilegeRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\AdminPrivilege\GetAdminPrivilegesRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\AdminPrivilege\ReplaceAdminPrivilegeByNameRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\AdminPrivilege\ReplaceAdminPrivilegeRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\AdminPrivilege\UpdateAdminPrivilegeByNameRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\AdminPrivilege\UpdateAdminPrivilegeRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage admin privileges, from ClearPass::globalServerConfiguration()->adminPrivileges().
 *
 * @extends Builder<AdminPrivilege>
 */
class AdminPrivilegeResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, AdminPrivilege::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAdminPrivilegesRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateAdminPrivilegeRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetAdminPrivilegeRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateAdminPrivilegeRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceAdminPrivilegeRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteAdminPrivilegeRequest((int) $id, $options);
    }

    /**
     * Get an admin privilege by name: GET /admin-privilege/name/{name}.
     */
    public function findByName(string $name): ?AdminPrivilege
    {
        return $this->fetchOrNull(new GetAdminPrivilegeByNameRequest($name));
    }

    /**
     * Update some fields of an admin privilege by name: PATCH /admin-privilege/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?AdminPrivilege
    {
        return $this->fetch(new UpdateAdminPrivilegeByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace an admin privilege by name: PUT /admin-privilege/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?AdminPrivilege
    {
        return $this->fetch(new ReplaceAdminPrivilegeByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete an admin privilege by name: DELETE /admin-privilege/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteAdminPrivilegeByNameRequest($name, $options));

        return true;
    }
}
