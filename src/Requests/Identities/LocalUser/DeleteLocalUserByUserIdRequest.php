<?php

namespace spkm\ClearPass\Requests\Identities\LocalUser;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a local user by user_id: DELETE /local-user/user-id/{user_id}.
 */
class DeleteLocalUserByUserIdRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $userId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/local-user/user-id/'.rawurlencode((string) $this->userId);
    }
}
