<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\OnGuardCustomScript;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an OnGuard Custom Script by name: DELETE /onguard-custom-script/name/{name}.
 */
class DeleteOnGuardCustomScriptByNameRequest extends DeleteRequest
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
        return '/onguard-custom-script/name/'.rawurlencode((string) $this->name);
    }
}
