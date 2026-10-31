<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\DURClass;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\DURClass;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Add a DUR Class: POST /enforcement-profile-dur/dur-class/{product_name}.
 */
class CreateDURClassRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = DURClass::class;

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
        return '/enforcement-profile-dur/dur-class/'.rawurlencode((string) $this->productName);
    }
}
