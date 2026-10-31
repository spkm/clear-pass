<?php

namespace spkm\ClearPass\Requests\Identities\DenyListedUsers;

use spkm\ClearPass\Data\Identities\DenyListedUsers;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a deny listed user by Username and MAC Address: GET /deny-listed-users/user_id/{user_id}/mac_address/{mac_address}.
 */
class GetDenyListedUserByUserIdAndMacAddressRequest extends ItemRequest
{
    protected ?string $dto = DenyListedUsers::class;

    public function __construct(protected string $userId, protected string $macAddress) {}

    public function resolveEndpoint(): string
    {
        return '/deny-listed-users/user_id/'.rawurlencode((string) $this->userId).'/mac_address/'.rawurlencode((string) $this->macAddress);
    }
}
