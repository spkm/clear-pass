<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\OnGuardZoneMapping;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete authentication server IP addresses for Policy Manager Zone by name: DELETE /onguard/policy-manager-zones/name/{name}.
 */
class DeleteOnGuardZoneMappingByNameRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/onguard/policy-manager-zones/name/'.rawurlencode((string) $this->name);
    }
}
