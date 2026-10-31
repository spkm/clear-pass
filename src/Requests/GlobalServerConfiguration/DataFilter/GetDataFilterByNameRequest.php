<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\DataFilter;

use spkm\ClearPass\Data\GlobalServerConfiguration\DataFilter;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a data filter by name: GET /data-filter/name/{name}.
 */
class GetDataFilterByNameRequest extends ItemRequest
{
    protected ?string $dto = DataFilter::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/data-filter/name/'.rawurlencode((string) $this->name);
    }
}
