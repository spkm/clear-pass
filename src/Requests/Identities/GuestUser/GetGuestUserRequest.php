<?php

namespace spkm\ClearPass\Requests\Identities\GuestUser;

use spkm\ClearPass\Data\Identities\GuestUser;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a guest account: GET /guest/{guest_id}.
 */
class GetGuestUserRequest extends ItemRequest
{
    protected ?string $dto = GuestUser::class;

    public function __construct(protected int $guestId) {}

    public function resolveEndpoint(): string
    {
        return '/guest/'.$this->guestId;
    }
}
