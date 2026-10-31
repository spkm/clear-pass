<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\DataFilter;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a data filter: DELETE /data-filter/{data_filter_id}.
 */
class DeleteDataFilterRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $dataFilterId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/data-filter/'.$this->dataFilterId;
    }
}
