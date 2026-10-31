<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\OnGuardCustomScript;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\OnGuardCustomScript;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of an OnGuard Custom Script: PATCH /onguard-custom-script/{onguard_custom_script_id}.
 */
class UpdateOnGuardCustomScriptRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

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
