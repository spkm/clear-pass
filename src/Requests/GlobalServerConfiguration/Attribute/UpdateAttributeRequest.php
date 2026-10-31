<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\Attribute;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\Attribute;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of an attribute: PATCH /attribute/{attribute_id}.
 */
class UpdateAttributeRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

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
