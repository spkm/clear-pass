<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\TimeRange;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\TimeRange;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of a Time Range by name: PATCH /enforcement-profile-dur/time-range/{product_name}/name/{name}.
 */
class UpdateTimeRangeByNameRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = TimeRange::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected string $name, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/time-range/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
