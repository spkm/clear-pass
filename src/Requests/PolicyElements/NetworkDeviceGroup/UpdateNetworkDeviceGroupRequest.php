<?php

namespace spkm\ClearPass\Requests\PolicyElements\NetworkDeviceGroup;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\NetworkDeviceGroup;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of a network device group: PATCH /network-device-group/{network_device_group_id}.
 */
class UpdateNetworkDeviceGroupRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

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
