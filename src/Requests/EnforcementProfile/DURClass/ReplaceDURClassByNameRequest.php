<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\DURClass;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\DURClass;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a DUR Class by name: PUT /enforcement-profile-dur/dur-class/{product_name}/name/{name}.
 */
class ReplaceDURClassByNameRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = DURClass::class;

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
        return '/enforcement-profile-dur/dur-class/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
