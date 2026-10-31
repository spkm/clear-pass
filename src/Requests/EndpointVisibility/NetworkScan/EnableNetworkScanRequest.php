<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\NetworkScan;

use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\NetworkScan;
use spkm\ClearPass\Requests\ActionRequest;

/**
 * Update some fields of a NetworkScan: PATCH /config/network-scan/{scan_id}/enable.
 */
class EnableNetworkScanRequest extends ActionRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = NetworkScan::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $scanId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/config/network-scan/'.$this->scanId.'/enable';
    }
}
