<?php

namespace spkm\ClearPass\Requests\PolicyElements\NetworkDevice;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\NetworkDevice;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a network device by name: PUT /network-device/name/{name}.
 */
class ReplaceNetworkDeviceByNameRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = NetworkDevice::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-device/name/'.rawurlencode((string) $this->name);
    }
}
