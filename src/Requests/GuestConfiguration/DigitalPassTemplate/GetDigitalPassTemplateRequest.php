<?php

namespace spkm\ClearPass\Requests\GuestConfiguration\DigitalPassTemplate;

use spkm\ClearPass\Data\GuestConfiguration\DigitalPassTemplate;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a pass template: GET /template/pass/{id}.
 */
class GetDigitalPassTemplateRequest extends ItemRequest
{
    protected ?string $dto = DigitalPassTemplate::class;

    public function __construct(protected int|string $id) {}

    public function resolveEndpoint(): string
    {
        return '/template/pass/'.rawurlencode((string) $this->id);
    }
}
