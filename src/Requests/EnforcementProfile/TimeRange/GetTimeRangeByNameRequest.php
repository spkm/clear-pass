<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\TimeRange;

use spkm\ClearPass\Data\EnforcementProfile\TimeRange;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Time Range by name: GET /enforcement-profile-dur/time-range/{product_name}/name/{name}.
 */
class GetTimeRangeByNameRequest extends ItemRequest
{
    protected ?string $dto = TimeRange::class;

    public function __construct(protected string $productName, protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/time-range/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
