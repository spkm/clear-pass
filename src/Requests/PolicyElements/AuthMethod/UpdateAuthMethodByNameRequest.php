<?php

namespace spkm\ClearPass\Requests\PolicyElements\AuthMethod;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\AuthMethod;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of an authentication method by name: PATCH /auth-method/name/{name}.
 */
class UpdateAuthMethodByNameRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = AuthMethod::class;

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
        return '/auth-method/name/'.rawurlencode((string) $this->name);
    }
}
