<?php

namespace spkm\ClearPass\Requests\PolicyElements\NetworkDeviceGroup;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\NetworkDeviceGroup;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of a network device group by name: PATCH /network-device-group/name/{name}.
 */
class UpdateNetworkDeviceGroupByNameRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

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
