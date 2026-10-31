<?php

namespace spkm\ClearPass\Requests\Identities\DenyListedUsers;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a deny listed user by Username and MAC Address: DELETE /deny-listed-users/user_id/{user_id}/mac_address/{mac_address}.
 */
class DeleteDenyListedUserUserIdMacAddressRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $userId, protected string $macAddress, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/deny-listed-users/user_id/'.rawurlencode((string) $this->userId).'/mac_address/'.rawurlencode((string) $this->macAddress);
    }
}
