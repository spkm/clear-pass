<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\DataFilter;

use spkm\ClearPass\Data\GlobalServerConfiguration\DataFilter;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a data filter: GET /data-filter/{data_filter_id}.
 */
class GetDataFilterRequest extends ItemRequest
{
    protected ?string $dto = DataFilter::class;

    public function __construct(protected int $dataFilterId) {}

    public function resolveEndpoint(): string
    {
        return '/data-filter/'.$this->dataFilterId;
    }
}
