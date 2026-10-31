<?php

namespace spkm\ClearPass\Requests\Insight\Report;

use spkm\ClearPass\Data\Insight\Report;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an Insight report configuration by id: GET /report/{id}.
 */
class GetReportRequest extends ItemRequest
{
    protected ?string $dto = Report::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/report/'.$this->id;
    }
}
