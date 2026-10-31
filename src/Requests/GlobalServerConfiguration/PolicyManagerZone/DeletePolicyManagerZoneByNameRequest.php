<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\PolicyManagerZone;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete Policy Manager Zone by name: DELETE /server/policy-manager-zones/name/{name}.
 */
class DeletePolicyManagerZoneByNameRequest extends DeleteRequest
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
        return '/server/policy-manager-zones/name/'.rawurlencode((string) $this->name);
    }
}
