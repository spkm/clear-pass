<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\DataFilter;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a data filter by name: DELETE /data-filter/name/{name}.
 */
class DeleteDataFilterByNameRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/data-filter/name/'.rawurlencode((string) $this->name);
    }
}
