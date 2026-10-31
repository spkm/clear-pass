<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\Policy;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\Policy;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update a Policy by name: PATCH /enforcement-profile-dur/policy/{product_name}/name/{name}.
 */
class UpdatePolicyByNameRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = Policy::class;

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
        return '/enforcement-profile-dur/policy/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
