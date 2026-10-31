<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\OnGuardCustomScript;

use spkm\ClearPass\Data\EndpointVisibility\OnGuardCustomScript;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an OnGuard Custom Script: GET /onguard-custom-script/{onguard_custom_script_id}.
 */
class GetOnGuardCustomScriptRequest extends ItemRequest
{
    protected ?string $dto = OnGuardCustomScript::class;

    public function __construct(protected int $onguardCustomScriptId) {}

    public function resolveEndpoint(): string
    {
        return '/onguard-custom-script/'.$this->onguardCustomScriptId;
    }
}
