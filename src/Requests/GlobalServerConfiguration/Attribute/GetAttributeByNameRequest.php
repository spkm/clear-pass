<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\Attribute;

use spkm\ClearPass\Data\GlobalServerConfiguration\Attribute;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an attribute by name: GET /attribute/{entity_name}/name/{name}.
 */
class GetAttributeByNameRequest extends ItemRequest
{
    protected ?string $dto = Attribute::class;

    public function __construct(protected string $entityName, protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/attribute/'.rawurlencode((string) $this->entityName).'/name/'.rawurlencode((string) $this->name);
    }
}
