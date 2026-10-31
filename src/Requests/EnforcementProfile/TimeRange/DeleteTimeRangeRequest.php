<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\TimeRange;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a Time Range: DELETE /enforcement-profile-dur/time-range/{product_name}/{time_range_id}.
 */
class DeleteTimeRangeRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected int $timeRangeId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/time-range/'.rawurlencode((string) $this->productName).'/'.$this->timeRangeId;
    }
}
