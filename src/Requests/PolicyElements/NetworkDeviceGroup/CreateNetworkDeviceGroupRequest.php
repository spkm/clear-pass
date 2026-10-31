<?php

namespace spkm\ClearPass\Requests\PolicyElements\NetworkDeviceGroup;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\NetworkDeviceGroup;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new network device group: POST /network-device-group.
 */
class CreateNetworkDeviceGroupRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = NetworkDeviceGroup::class;

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
        return '/network-device-group';
    }
}
