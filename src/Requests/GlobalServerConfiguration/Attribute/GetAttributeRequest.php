<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\Attribute;

use spkm\ClearPass\Data\GlobalServerConfiguration\Attribute;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an attribute: GET /attribute/{attribute_id}.
 */
class GetAttributeRequest extends ItemRequest
{
    protected ?string $dto = Attribute::class;

    public function __construct(protected int $attributeId) {}

    public function resolveEndpoint(): string
    {
        return '/attribute/'.$this->attributeId;
    }
}
