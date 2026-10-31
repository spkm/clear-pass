<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\NetworkScan;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a NetworkScan: DELETE /config/network-scan/{scan_id}.
 */
class DeleteNetworkScanRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $scanId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/config/network-scan/'.$this->scanId;
    }
}
