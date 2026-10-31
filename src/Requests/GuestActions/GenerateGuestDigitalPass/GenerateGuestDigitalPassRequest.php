<?php

namespace spkm\ClearPass\Requests\GuestActions\GenerateGuestDigitalPass;

use spkm\ClearPass\Data\GuestActions\GuestDigitalReceiptResponse;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Generate digital pass for guest account based on template specified by ID: GET /guest/{guest_id}/pass/{id}.
 */
class GenerateGuestDigitalPassRequest extends ItemRequest
{
    protected ?string $dto = GuestDigitalReceiptResponse::class;

    public function __construct(protected int $guestId, protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/guest/'.$this->guestId.'/pass/'.$this->id;
    }
}
