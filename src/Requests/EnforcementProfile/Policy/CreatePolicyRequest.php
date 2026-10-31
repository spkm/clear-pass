<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\Policy;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\Policy;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Add a Policy: POST /enforcement-profile-dur/policy/{product_name}.
 */
class CreatePolicyRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = Policy::class;

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
        return '/enforcement-profile-dur/policy/'.rawurlencode((string) $this->productName);
    }
}
