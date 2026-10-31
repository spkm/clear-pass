<?php

namespace spkm\ClearPass\Requests\Insight\Report;

use spkm\ClearPass\Data\Insight\Report;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get all Insight report configurations: GET /report.
 */
class GetReportsRequest extends ListRequest
{
    protected ?string $dto = Report::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/report';
    }
}
