<?php

namespace spkm\ClearPass\Requests\Identities\Endpoint;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Identities\Endpoint;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace an endpoint by mac_address: PUT /endpoint/mac-address/{mac_address}.
 */
class ReplaceEndpointByMacAddressRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

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
