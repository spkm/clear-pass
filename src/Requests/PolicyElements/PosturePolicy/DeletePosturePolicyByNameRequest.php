<?php

namespace spkm\ClearPass\Requests\PolicyElements\PosturePolicy;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a Posture Policy by name: DELETE /posture-policy/name/{name}.
 */
class DeletePosturePolicyByNameRequest extends DeleteRequest
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
        return '/posture-policy/name/'.rawurlencode((string) $this->name);
    }
}
