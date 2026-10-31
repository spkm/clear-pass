<?php

namespace spkm\ClearPass\Requests\Insight\Alert;

use spkm\ClearPass\Data\Insight\Alert;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an Insight alert configuration by name: GET /alert/{name}.
 */
class GetAlertByNameRequest extends ItemRequest
{
    protected ?string $dto = Alert::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/alert/'.rawurlencode((string) $this->name);
    }
}
