<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\TimeRange;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\TimeRange;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of a Time Range: PATCH /enforcement-profile-dur/time-range/{product_name}/{time_range_id}.
 */
class UpdateTimeRangeRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = TimeRange::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected int $timeRangeId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/time-range/'.rawurlencode((string) $this->productName).'/'.$this->timeRangeId;
    }
}
