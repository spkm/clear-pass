<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\TimeRange;

use spkm\ClearPass\Data\EnforcementProfile\TimeRange;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * GET a list of Time Ranges: GET /enforcement-profile-dur/time-range/{product_name}.
 */
class GetTimeRangesRequest extends ListRequest
{
    protected ?string $dto = TimeRange::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $productName, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/time-range/'.rawurlencode((string) $this->productName);
    }
}
