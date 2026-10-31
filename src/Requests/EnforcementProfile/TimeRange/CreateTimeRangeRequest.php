<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\TimeRange;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\TimeRange;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Add a Time Range: POST /enforcement-profile-dur/time-range/{product_name}.
 */
class CreateTimeRangeRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = TimeRange::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/time-range/'.rawurlencode((string) $this->productName);
    }
}
