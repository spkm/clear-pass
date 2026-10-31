<?php

namespace spkm\ClearPass\Requests\Identities;

/**
 * The first version's guest list request: GET /guest, 100 at a time with the count, as it sent.
 *
 * @deprecated Use Identities\GuestUser\GetGuestUsersRequest (or ClearPass::identities()->guestUsers()).
 */
class GetGuestUsersRequest extends GuestUser\GetGuestUsersRequest
{
    /**
     * @param  array<string, mixed>  $queryParameters
     */
    public function __construct(array $queryParameters = [])
    {
        parent::__construct(array_merge(['offset' => 0, 'limit' => 100, 'calculate_count' => 'true'], $queryParameters));
    }
}
