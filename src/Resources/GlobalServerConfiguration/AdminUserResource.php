<?php

namespace spkm\ClearPass\Resources\GlobalServerConfiguration;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\GlobalServerConfiguration\AdminUser;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\AdminUser\CreateAdminUserRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\AdminUser\DeleteAdminUserByUserIdRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\AdminUser\DeleteAdminUserRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\AdminUser\GetAdminUserByUserIdRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\AdminUser\GetAdminUserRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\AdminUser\GetAdminUsersRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\AdminUser\ReplaceAdminUserByUserIdRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\AdminUser\ReplaceAdminUserRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\AdminUser\UpdateAdminUserByUserIdRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\AdminUser\UpdateAdminUserRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage admin users, from ClearPass::globalServerConfiguration()->adminUsers().
 *
 * @extends Builder<AdminUser>
 */
class AdminUserResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, AdminUser::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAdminUsersRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateAdminUserRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetAdminUserRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateAdminUserRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceAdminUserRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteAdminUserRequest((int) $id, $options);
    }

    /**
     * Get an admin user by user_id: GET /admin-user/user-id/{user_id}.
     */
    public function findByUserId(string $userId): ?AdminUser
    {
        return $this->fetchOrNull(new GetAdminUserByUserIdRequest($userId));
    }

    /**
     * Update some fields of an admin user by user_id: PATCH /admin-user/user-id/{user_id}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByUserId(string $userId, array|Data $attributes = [], array $options = []): ?AdminUser
    {
        return $this->fetch(new UpdateAdminUserByUserIdRequest($userId, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace an admin user by user_id: PUT /admin-user/user-id/{user_id}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByUserId(string $userId, array|Data $attributes = [], array $options = []): ?AdminUser
    {
        return $this->fetch(new ReplaceAdminUserByUserIdRequest($userId, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete an admin user by user_id: DELETE /admin-user/user-id/{user_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByUserId(string $userId, array $options = []): bool
    {
        $this->fetch(new DeleteAdminUserByUserIdRequest($userId, $options));

        return true;
    }
}
