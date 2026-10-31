<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\NetworkScan;

use spkm\ClearPass\Data\EndpointVisibility\NetworkScan;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a NetworkScan: GET /config/network-scan/{scan_id}.
 */
class GetNetworkScanRequest extends ItemRequest
{
    protected ?string $dto = NetworkScan::class;

    public function __construct(protected int $scanId) {}

    public function resolveEndpoint(): string
    {
        return '/config/network-scan/'.$this->scanId;
    }
}
