<?php

namespace spkm\ClearPass\Requests\PolicyElements\NetworkDeviceGroup;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\NetworkDeviceGroup;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a network device group by name: PUT /network-device-group/name/{name}.
 */
class ReplaceNetworkDeviceGroupByNameRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = NetworkDeviceGroup::class;

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
        return '/network-device-group/name/'.rawurlencode((string) $this->name);
    }
}
