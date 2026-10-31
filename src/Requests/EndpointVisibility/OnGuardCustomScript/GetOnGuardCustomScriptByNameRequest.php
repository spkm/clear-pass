<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\OnGuardCustomScript;

use spkm\ClearPass\Data\EndpointVisibility\OnGuardCustomScript;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an OnGuard Custom Script by name: GET /onguard-custom-script/name/{name}.
 */
class GetOnGuardCustomScriptByNameRequest extends ItemRequest
{
    protected ?string $dto = OnGuardCustomScript::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/onguard-custom-script/name/'.rawurlencode((string) $this->name);
    }
}
