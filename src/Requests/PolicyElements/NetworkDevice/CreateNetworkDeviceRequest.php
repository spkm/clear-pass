<?php

namespace spkm\ClearPass\Requests\PolicyElements\NetworkDevice;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\NetworkDevice;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new network device: POST /network-device.
 */
class CreateNetworkDeviceRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = NetworkDevice::class;

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
        return '/network-device';
    }
}
