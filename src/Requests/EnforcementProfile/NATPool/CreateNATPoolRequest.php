<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\NATPool;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\NATPool;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Add a NAT Pool: POST /enforcement-profile-dur/nat-pool/{product_name}.
 */
class CreateNATPoolRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = NATPool::class;

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
        return '/enforcement-profile-dur/nat-pool/'.rawurlencode((string) $this->productName);
    }
}
