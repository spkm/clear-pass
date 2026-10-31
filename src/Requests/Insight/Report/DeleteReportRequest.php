<?php

namespace spkm\ClearPass\Requests\Insight\Report;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an Insight report configuration by id: DELETE /report/{id}.
 */
class DeleteReportRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/report/'.$this->id;
    }
}
