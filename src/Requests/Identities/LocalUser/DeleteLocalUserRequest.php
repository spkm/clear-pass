<?php

namespace spkm\ClearPass\Requests\Identities\LocalUser;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a local user: DELETE /local-user/{local_user_id}.
 */
class DeleteLocalUserRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $localUserId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/local-user/'.$this->localUserId;
    }
}
