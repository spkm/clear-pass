<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\PolicyManagerZone;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete Policy Manager Zone: DELETE /server/policy-manager-zones/{zone_id}.
 */
class DeletePolicyManagerZoneRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $zoneId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/server/policy-manager-zones/'.$this->zoneId;
    }
}
