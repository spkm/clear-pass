<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\NetworkScan;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\NetworkScan;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Add a NetworkScan: POST /config/network-scan.
 */
class CreateNetworkScanRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = NetworkScan::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/config/network-scan';
    }
}
