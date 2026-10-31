<?php

namespace spkm\ClearPass\Requests\PolicyElements\AuthMethod;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\AuthMethod;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new authentication method: POST /auth-method.
 */
class CreateAuthMethodRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = AuthMethod::class;

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
        return '/auth-method';
    }
}
