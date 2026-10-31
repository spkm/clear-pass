<?php

namespace spkm\ClearPass\Requests\Identities;

/**
 * The first version's request for a guest account by username.
 *
 * @deprecated Use Identities\GuestUser\GetGuestUserByUsernameRequest (or ClearPass::identities()->guestUsers()).
 */
class GetGuestUserByUsernameRequest extends GuestUser\GetGuestUserByUsernameRequest
{
    /**
     * @param  array<string, mixed>  $queryParameters
     */
    public function __construct(string $username, protected array $queryParameters = [])
    {
        parent::__construct($username);
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return $this->queryParameters;
    }
}
