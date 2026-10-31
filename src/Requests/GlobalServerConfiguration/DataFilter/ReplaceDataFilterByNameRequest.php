<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\DataFilter;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\DataFilter;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a data filter by name: PUT /data-filter/name/{name}.
 */
class ReplaceDataFilterByNameRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = DataFilter::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/data-filter/name/'.rawurlencode((string) $this->name);
    }
}
