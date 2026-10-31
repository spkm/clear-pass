<?php

namespace spkm\ClearPass\Resources\Identities;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\Identities\GuestUser;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\Identities\GuestUser\CreateGuestUserRequest;
use spkm\ClearPass\Requests\Identities\GuestUser\DeleteGuestUserByUsernameRequest;
use spkm\ClearPass\Requests\Identities\GuestUser\DeleteGuestUserRequest;
use spkm\ClearPass\Requests\Identities\GuestUser\GetGuestUserByUsernameRequest;
use spkm\ClearPass\Requests\Identities\GuestUser\GetGuestUserRequest;
use spkm\ClearPass\Requests\Identities\GuestUser\GetGuestUsersRequest;
use spkm\ClearPass\Requests\Identities\GuestUser\ReplaceGuestUserByUsernameRequest;
use spkm\ClearPass\Requests\Identities\GuestUser\ReplaceGuestUserRequest;
use spkm\ClearPass\Requests\Identities\GuestUser\UpdateGuestUserByUsernameRequest;
use spkm\ClearPass\Requests\Identities\GuestUser\UpdateGuestUserRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage guest accounts, from ClearPass::identities()->guestUsers().
 *
 * @extends Builder<GuestUser>
 */
class GuestUserResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, GuestUser::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetGuestUsersRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateGuestUserRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetGuestUserRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateGuestUserRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceGuestUserRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteGuestUserRequest((int) $id, $options);
    }

    /**
     * Get a guest account by username: GET /guest/username/{username}.
     */
    public function findByUsername(string $username): ?GuestUser
    {
        return $this->fetchOrNull(new GetGuestUserByUsernameRequest($username));
    }

    /**
     * Update some fields of a guest account by username: PATCH /guest/username/{username}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options  Query options: change_of_authorization
     */
    public function updateByUsername(string $username, array|Data $attributes = [], array $options = []): ?GuestUser
    {
        return $this->fetch(new UpdateGuestUserByUsernameRequest($username, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a guest account by username: PUT /guest/username/{username}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options  Query options: change_of_authorization
     */
    public function replaceByUsername(string $username, array|Data $attributes = [], array $options = []): ?GuestUser
    {
        return $this->fetch(new ReplaceGuestUserByUsernameRequest($username, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a guest account by username: DELETE /guest/username/{username}.
     *
     * @param  array<string, mixed>  $options  Query options: change_of_authorization
     */
    public function deleteByUsername(string $username, array $options = []): bool
    {
        $this->fetch(new DeleteGuestUserByUsernameRequest($username, $options));

        return true;
    }
}
