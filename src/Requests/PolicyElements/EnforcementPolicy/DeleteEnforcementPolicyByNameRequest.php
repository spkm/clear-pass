<?php

namespace spkm\ClearPass\Requests\PolicyElements\EnforcementPolicy;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a enforcement policy by name: DELETE /enforcement-policy/name/{name}.
 */
class DeleteEnforcementPolicyByNameRequest extends DeleteRequest
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
        return '/enforcement-policy/name/'.rawurlencode((string) $this->name);
    }
}
