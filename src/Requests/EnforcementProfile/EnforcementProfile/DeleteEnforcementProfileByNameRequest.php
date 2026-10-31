<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\EnforcementProfile;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an Enforcement Profile by name: DELETE /enforcement-profile/name/{name}.
 */
class DeleteEnforcementProfileByNameRequest extends DeleteRequest
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
        return '/enforcement-profile/name/'.rawurlencode((string) $this->name);
    }
}
