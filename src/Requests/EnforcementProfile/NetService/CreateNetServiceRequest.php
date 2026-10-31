<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\NetService;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\NetService;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Add a Net Service: POST /enforcement-profile-dur/net-service/{product_name}.
 */
class CreateNetServiceRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = NetService::class;

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
        return '/enforcement-profile-dur/net-service/'.rawurlencode((string) $this->productName);
    }
}
