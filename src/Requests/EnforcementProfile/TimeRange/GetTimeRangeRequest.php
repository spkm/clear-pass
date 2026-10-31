<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\TimeRange;

use spkm\ClearPass\Data\EnforcementProfile\TimeRange;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Time Range: GET /enforcement-profile-dur/time-range/{product_name}/{time_range_id}.
 */
class GetTimeRangeRequest extends ItemRequest
{
    protected ?string $dto = TimeRange::class;

    public function __construct(protected string $productName, protected int $timeRangeId) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/time-range/'.rawurlencode((string) $this->productName).'/'.$this->timeRangeId;
    }
}
