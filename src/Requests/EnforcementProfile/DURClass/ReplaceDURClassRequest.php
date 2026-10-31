<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\DURClass;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\DURClass;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a DUR Class: PUT /enforcement-profile-dur/dur-class/{product_name}/{dur_class_id}.
 */
class ReplaceDURClassRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = DURClass::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected int $durClassId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/dur-class/'.rawurlencode((string) $this->productName).'/'.$this->durClassId;
    }
}
