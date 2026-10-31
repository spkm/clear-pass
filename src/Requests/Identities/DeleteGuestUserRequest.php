<?php

namespace spkm\ClearPass\Requests\Identities;

/**
 * The first version's request to delete a guest account by id.
 *
 * @deprecated Use Identities\GuestUser\DeleteGuestUserRequest (or ClearPass::identities()->guestUsers()).
 */
class DeleteGuestUserRequest extends GuestUser\DeleteGuestUserRequest
{
    /**
     * @param  array<string, mixed>  $queryParameters
     */
    public function __construct(int $id, array $queryParameters = [])
    {
        parent::__construct($id, $queryParameters);
    }
}
