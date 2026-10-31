<?php

namespace spkm\ClearPass\Requests\GuestConfiguration\PrintTemplate;

use spkm\ClearPass\Data\GuestConfiguration\PrintTemplate;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a print template: GET /template/print/{id}.
 */
class GetPrintTemplateRequest extends ItemRequest
{
    protected ?string $dto = PrintTemplate::class;

    public function __construct(protected int|string $id) {}

    public function resolveEndpoint(): string
    {
        return '/template/print/'.rawurlencode((string) $this->id);
    }
}
