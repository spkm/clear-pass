<?php

namespace spkm\ClearPass\Requests\Identities\Device;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Identities\Device;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of a device account by MAC address: PATCH /device/mac/{macaddr}.
 */
class UpdateDeviceByMacRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = Device::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options: change_of_authorization
     */
    public function __construct(protected string $macaddr, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/device/mac/'.rawurlencode((string) $this->macaddr);
    }
}
