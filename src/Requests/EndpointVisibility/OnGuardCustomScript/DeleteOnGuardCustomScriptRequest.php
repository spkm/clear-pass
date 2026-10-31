<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\OnGuardCustomScript;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an OnGuard Custom Script: DELETE /onguard-custom-script/{onguard_custom_script_id}.
 */
class DeleteOnGuardCustomScriptRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $onguardCustomScriptId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/onguard-custom-script/'.$this->onguardCustomScriptId;
    }
}
