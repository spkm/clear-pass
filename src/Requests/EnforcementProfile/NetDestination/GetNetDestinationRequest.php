<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\NetDestination;

use spkm\ClearPass\Data\EnforcementProfile\NetDestination;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Net Destination: GET /enforcement-profile-dur/net-destination/{product_name}/{net_destination_id}.
 */
class GetNetDestinationRequest extends ItemRequest
{
    protected ?string $dto = NetDestination::class;

    public function __construct(protected string $productName, protected int $netDestinationId) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/net-destination/'.rawurlencode((string) $this->productName).'/'.$this->netDestinationId;
    }
}
