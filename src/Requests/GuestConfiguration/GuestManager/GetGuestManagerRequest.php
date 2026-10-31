<?php

namespace spkm\ClearPass\Requests\GuestConfiguration\GuestManager;

use spkm\ClearPass\Data\GuestConfiguration\GuestManager;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Return settings from Configuration -> Guest Manager: GET /guestmanager.
 */
class GetGuestManagerRequest extends ItemRequest
{
    protected ?string $dto = GuestManager::class;

    public function resolveEndpoint(): string
    {
        return '/guestmanager';
    }
}
