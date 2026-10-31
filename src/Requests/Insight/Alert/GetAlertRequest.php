<?php

namespace spkm\ClearPass\Requests\Insight\Alert;

use spkm\ClearPass\Data\Insight\Alert;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an Insight alert configuration by id: GET /alert/{id}.
 */
class GetAlertRequest extends ItemRequest
{
    protected ?string $dto = Alert::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/alert/'.$this->id;
    }
}
