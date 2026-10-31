<?php

namespace spkm\ClearPass\Requests\Identities\Endpoint;

use spkm\ClearPass\Data\Identities\Endpoint;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an endpoint by mac_address: GET /endpoint/mac-address/{mac_address}.
 */
class GetEndpointByMacAddressRequest extends ItemRequest
{
    protected ?string $dto = Endpoint::class;

    public function __construct(protected string $macAddress) {}

    public function resolveEndpoint(): string
    {
        return '/endpoint/mac-address/'.rawurlencode((string) $this->macAddress);
    }
}
