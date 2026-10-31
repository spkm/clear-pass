<?php

namespace spkm\ClearPass\Requests\Insight\Report;

use spkm\ClearPass\Data\Insight\Report;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an Insight report configuration by name: GET /report/{name}.
 */
class GetReportByNameRequest extends ItemRequest
{
    protected ?string $dto = Report::class;

    public function __construct(protected int $name) {}

    public function resolveEndpoint(): string
    {
        return '/report/'.$this->name;
    }
}
