<?php

namespace spkm\ClearPass\Requests\Insight\Report;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an Insight report configuration by name: DELETE /report/{name}.
 */
class DeleteReportByNameRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/report/'.$this->name;
    }
}
