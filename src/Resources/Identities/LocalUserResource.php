<?php

namespace spkm\ClearPass\Resources\Identities;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\Identities\LocalUser;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\Identities\LocalUser\CreateLocalUserRequest;
use spkm\ClearPass\Requests\Identities\LocalUser\DeleteLocalUserByUserIdRequest;
use spkm\ClearPass\Requests\Identities\LocalUser\DeleteLocalUserRequest;
use spkm\ClearPass\Requests\Identities\LocalUser\GetLocalUserByUserIdRequest;
use spkm\ClearPass\Requests\Identities\LocalUser\GetLocalUserRequest;
use spkm\ClearPass\Requests\Identities\LocalUser\GetLocalUsersRequest;
use spkm\ClearPass\Requests\Identities\LocalUser\ReplaceLocalUserByUserIdRequest;
use spkm\ClearPass\Requests\Identities\LocalUser\ReplaceLocalUserRequest;
use spkm\ClearPass\Requests\Identities\LocalUser\UpdateLocalUserByUserIdRequest;
use spkm\ClearPass\Requests\Identities\LocalUser\UpdateLocalUserRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage local users, from ClearPass::identities()->localUsers().
 *
 * @extends Builder<LocalUser>
 */
class LocalUserResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, LocalUser::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetLocalUsersRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateLocalUserRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetLocalUserRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateLocalUserRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceLocalUserRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteLocalUserRequest((int) $id, $options);
    }

    /**
     * Get a local user by user_id: GET /local-user/user-id/{user_id}.
     */
    public function findByUserId(string $userId): ?LocalUser
    {
        return $this->fetchOrNull(new GetLocalUserByUserIdRequest($userId));
    }

    /**
     * Update some fields of a local user by user_id: PATCH /local-user/user-id/{user_id}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByUserId(string $userId, array|Data $attributes = [], array $options = []): ?LocalUser
    {
        return $this->fetch(new UpdateLocalUserByUserIdRequest($userId, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a local user by user_id: PUT /local-user/user-id/{user_id}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByUserId(string $userId, array|Data $attributes = [], array $options = []): ?LocalUser
    {
        return $this->fetch(new ReplaceLocalUserByUserIdRequest($userId, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a local user by user_id: DELETE /local-user/user-id/{user_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByUserId(string $userId, array $options = []): bool
    {
        $this->fetch(new DeleteLocalUserByUserIdRequest($userId, $options));

        return true;
    }
}
