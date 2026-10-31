<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\NetService;

use spkm\ClearPass\Data\EnforcementProfile\NetService;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Net Service: GET /enforcement-profile-dur/net-service/{product_name}/{net_service_id}.
 */
class GetNetServiceRequest extends ItemRequest
{
    protected ?string $dto = NetService::class;

    public function __construct(protected string $productName, protected int $netServiceId) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/net-service/'.rawurlencode((string) $this->productName).'/'.$this->netServiceId;
    }
}
