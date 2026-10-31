<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\Attribute;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\Attribute;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new attribute: POST /attribute.
 */
class CreateAttributeRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = Attribute::class;

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
        return '/attribute';
    }
}
