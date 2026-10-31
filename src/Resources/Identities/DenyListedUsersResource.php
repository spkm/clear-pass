<?php

namespace spkm\ClearPass\Resources\Identities;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Identities\DenyListedUsers;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\Identities\DenyListedUsers\DeleteDenyListedUserRequest;
use spkm\ClearPass\Requests\Identities\DenyListedUsers\DeleteDenyListedUserUserIdMacAddressRequest;
use spkm\ClearPass\Requests\Identities\DenyListedUsers\GetDenyListedUserByUserIdAndMacAddressRequest;
use spkm\ClearPass\Requests\Identities\DenyListedUsers\GetDenyListedUserRequest;
use spkm\ClearPass\Requests\Identities\DenyListedUsers\GetDenyListedUsersRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage deny listed users, from ClearPass::identities()->denyListedUsers().
 *
 * @extends Builder<DenyListedUsers>
 */
class DenyListedUsersResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, DenyListedUsers::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetDenyListedUsersRequest($query);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetDenyListedUserRequest((int) $id);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteDenyListedUserRequest((int) $id, $options);
    }

    /**
     * Get a deny listed user by Username and MAC Address: GET /deny-listed-users/user_id/{user_id}/mac_address/{mac_address}.
     */
    public function findByUserIdAndMacAddress(string $userId, string $macAddress): ?DenyListedUsers
    {
        return $this->fetchOrNull(new GetDenyListedUserByUserIdAndMacAddressRequest($userId, $macAddress));
    }

    /**
     * Delete a deny listed user by Username and MAC Address: DELETE /deny-listed-users/user_id/{user_id}/mac_address/{mac_address}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteUserIdMacAddress(string $userId, string $macAddress, array $options = []): bool
    {
        $this->fetch(new DeleteDenyListedUserUserIdMacAddressRequest($userId, $macAddress, $options));

        return true;
    }
}
