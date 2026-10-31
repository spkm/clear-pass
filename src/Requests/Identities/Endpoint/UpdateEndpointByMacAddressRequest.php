<?php

namespace spkm\ClearPass\Requests\Identities\Endpoint;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Identities\Endpoint;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of an endpoint by mac_address: PATCH /endpoint/mac-address/{mac_address}.
 */
class UpdateEndpointByMacAddressRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = Endpoint::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $macAddress, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/endpoint/mac-address/'.rawurlencode((string) $this->macAddress);
    }
}
