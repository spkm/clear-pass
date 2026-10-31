<?php

namespace spkm\ClearPass\Requests\Identities;

/**
 * The first version's request for a guest account by id.
 *
 * @deprecated Use Identities\GuestUser\GetGuestUserRequest (or ClearPass::identities()->guestUsers()).
 */
class GetGuestUserRequest extends GuestUser\GetGuestUserRequest
{
    /**
     * @param  array<string, mixed>  $queryParameters
     */
    public function __construct(int $id, protected array $queryParameters = [])
    {
        parent::__construct($id);
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return $this->queryParameters;
    }
}
