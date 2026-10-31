<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\OnGuardCustomScript;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\OnGuardCustomScript;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of an OnGuard Custom Script by name: PATCH /onguard-custom-script/name/{name}.
 */
class UpdateOnGuardCustomScriptByNameRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = OnGuardCustomScript::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/onguard-custom-script/name/'.rawurlencode((string) $this->name);
    }
}
