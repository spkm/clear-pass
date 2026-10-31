<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\NATPool;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\NATPool;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of a NAT Pool: PATCH /enforcement-profile-dur/nat-pool/{product_name}/{nat_pool_id}.
 */
class UpdateNATPoolRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = NATPool::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected int $natPoolId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/nat-pool/'.rawurlencode((string) $this->productName).'/'.$this->natPoolId;
    }
}
