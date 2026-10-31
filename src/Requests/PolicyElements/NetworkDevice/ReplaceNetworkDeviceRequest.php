<?php

namespace spkm\ClearPass\Requests\PolicyElements\NetworkDevice;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\NetworkDevice;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a network device: PUT /network-device/{network_device_id}.
 */
class ReplaceNetworkDeviceRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = NetworkDevice::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $networkDeviceId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-device/'.$this->networkDeviceId;
    }
}
