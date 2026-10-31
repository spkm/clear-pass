<?php

namespace spkm\ClearPass\Requests\Identities\GuestUser;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a guest account: DELETE /guest/{guest_id}.
 */
class DeleteGuestUserRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: change_of_authorization
     */
    public function __construct(protected int $guestId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/guest/'.$this->guestId;
    }
}
