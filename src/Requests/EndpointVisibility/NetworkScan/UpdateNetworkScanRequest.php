<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\NetworkScan;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\NetworkScan;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of a NetworkScan: PATCH /config/network-scan/{scan_id}.
 */
class UpdateNetworkScanRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

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
