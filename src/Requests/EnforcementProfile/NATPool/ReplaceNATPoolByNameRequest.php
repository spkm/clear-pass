<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\NATPool;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\NATPool;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a NAT Pool by name: PUT /enforcement-profile-dur/nat-pool/{product_name}/name/{name}.
 */
class ReplaceNATPoolByNameRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = NATPool::class;

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
        return '/enforcement-profile-dur/nat-pool/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
