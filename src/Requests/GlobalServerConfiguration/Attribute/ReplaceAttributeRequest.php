<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\Attribute;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\Attribute;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace an attribute: PUT /attribute/{attribute_id}.
 */
class ReplaceAttributeRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = Attribute::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $attributeId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/attribute/'.$this->attributeId;
    }
}
