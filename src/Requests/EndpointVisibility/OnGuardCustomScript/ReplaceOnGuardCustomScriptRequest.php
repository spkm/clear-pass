<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\OnGuardCustomScript;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\OnGuardCustomScript;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace an OnGuard Custom Script: PUT /onguard-custom-script/{onguard_custom_script_id}.
 */
class ReplaceOnGuardCustomScriptRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = OnGuardCustomScript::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $onguardCustomScriptId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/onguard-custom-script/'.$this->onguardCustomScriptId;
    }
}
