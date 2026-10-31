<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\OnGuardCustomScript;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\OnGuardCustomScript;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new OnGuard Custom Script: POST /onguard-custom-script.
 */
class CreateOnGuardCustomScriptRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = OnGuardCustomScript::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/onguard-custom-script';
    }
}
