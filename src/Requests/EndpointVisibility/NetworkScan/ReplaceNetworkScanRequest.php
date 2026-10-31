<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\NetworkScan;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\NetworkScan;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update all fields of a NetworkScan: PUT /config/network-scan/{scan_id}.
 */
class ReplaceNetworkScanRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = NetworkScan::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $scanId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/config/network-scan/'.$this->scanId;
    }
}
