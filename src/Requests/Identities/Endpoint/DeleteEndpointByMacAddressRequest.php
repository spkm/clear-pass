<?php

namespace spkm\ClearPass\Requests\Identities\Endpoint;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an endpoint by mac_address: DELETE /endpoint/mac-address/{mac_address}.
 */
class DeleteEndpointByMacAddressRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $macAddress, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/endpoint/mac-address/'.rawurlencode((string) $this->macAddress);
    }
}
