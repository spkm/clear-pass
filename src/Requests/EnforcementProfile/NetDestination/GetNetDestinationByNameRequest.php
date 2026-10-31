<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\NetDestination;

use spkm\ClearPass\Data\EnforcementProfile\NetDestination;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Net Destination by name: GET /enforcement-profile-dur/net-destination/{product_name}/name/{name}.
 */
class GetNetDestinationByNameRequest extends ItemRequest
{
    protected ?string $dto = NetDestination::class;

    public function __construct(protected string $productName, protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/net-destination/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
