<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\OnGuardZoneMapping;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete authentication server IP addresses for Policy Manager Zone: DELETE /onguard/policy-manager-zones/{policy_manager_zones_id}.
 */
class DeleteOnGuardZoneMappingRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $policyManagerZonesId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/onguard/policy-manager-zones/'.$this->policyManagerZonesId;
    }
}
