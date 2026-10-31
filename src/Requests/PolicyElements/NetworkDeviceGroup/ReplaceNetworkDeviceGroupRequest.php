<?php

namespace spkm\ClearPass\Requests\PolicyElements\NetworkDeviceGroup;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\NetworkDeviceGroup;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a network device group: PUT /network-device-group/{network_device_group_id}.
 */
class ReplaceNetworkDeviceGroupRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = NetworkDeviceGroup::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $networkDeviceGroupId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-device-group/'.$this->networkDeviceGroupId;
    }
}
