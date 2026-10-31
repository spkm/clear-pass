<?php

namespace spkm\ClearPass\Requests\Identities\GuestUser;

use spkm\ClearPass\Data\Identities\GuestUser;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a guest account by username: GET /guest/username/{username}.
 */
class GetGuestUserByUsernameRequest extends ItemRequest
{
    protected ?string $dto = GuestUser::class;

    public function __construct(protected string $username) {}

    public function resolveEndpoint(): string
    {
        return '/guest/username/'.rawurlencode((string) $this->username);
    }
}
