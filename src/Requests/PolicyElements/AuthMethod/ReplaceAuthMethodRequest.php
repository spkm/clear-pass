<?php

namespace spkm\ClearPass\Requests\PolicyElements\AuthMethod;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\AuthMethod;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace an authentication method: PUT /auth-method/{auth_method_id}.
 */
class ReplaceAuthMethodRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = AuthMethod::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $authMethodId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/auth-method/'.$this->authMethodId;
    }
}
