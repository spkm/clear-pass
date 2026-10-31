<?php

namespace spkm\ClearPass\Requests\GuestActions\GenerateGuestReceipt;

use spkm\ClearPass\Data\GuestActions\GenerateGuestReceiptResponse;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Generate print template for guest account, using specified template ID: GET /guest/{guest_id}/receipt/{id}.
 */
class GenerateGuestReceiptRequest extends ItemRequest
{
    protected ?string $dto = GenerateGuestReceiptResponse::class;

    public function __construct(protected int $guestId, protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/guest/'.$this->guestId.'/receipt/'.$this->id;
    }
}
