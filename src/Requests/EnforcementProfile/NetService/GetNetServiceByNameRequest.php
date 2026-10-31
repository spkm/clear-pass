<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\NetService;

use spkm\ClearPass\Data\EnforcementProfile\NetService;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Net Service by name: GET /enforcement-profile-dur/net-service/{product_name}/name/{name}.
 */
class GetNetServiceByNameRequest extends ItemRequest
{
    protected ?string $dto = NetService::class;

    public function __construct(protected string $productName, protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/net-service/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
