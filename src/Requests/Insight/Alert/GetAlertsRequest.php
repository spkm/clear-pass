<?php

namespace spkm\ClearPass\Requests\Insight\Alert;

use spkm\ClearPass\Data\Insight\Alert;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get all Insight alert configurations: GET /alert.
 */
class GetAlertsRequest extends ListRequest
{
    protected ?string $dto = Alert::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/alert';
    }
}
