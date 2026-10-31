<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\NetService;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\NetService;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of a Net Service by name: PATCH /enforcement-profile-dur/net-service/{product_name}/name/{name}.
 */
class UpdateNetServiceByNameRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = NetService::class;

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
        return '/enforcement-profile-dur/net-service/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
