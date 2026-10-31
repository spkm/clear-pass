<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\NetDestination;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a Net Destination: DELETE /enforcement-profile-dur/net-destination/{product_name}/{net_destination_id}.
 */
class DeleteNetDestinationRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected int $netDestinationId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/net-destination/'.rawurlencode((string) $this->productName).'/'.$this->netDestinationId;
    }
}
