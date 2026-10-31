<?php

namespace spkm\ClearPass\Requests\Identities\Device;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Identities\Device;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new device account: POST /device.
 */
class CreateDeviceRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = Device::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options: change_of_authorization
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/device';
    }
}
