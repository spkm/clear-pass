<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\DataFilter;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\DataFilter;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new data filter: POST /data-filter.
 */
class CreateDataFilterRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = DataFilter::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/data-filter';
    }
}
