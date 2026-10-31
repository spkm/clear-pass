<?php

namespace spkm\ClearPass\Requests\PolicyElements\AuthMethod;

use spkm\ClearPass\Data\PolicyElements\AuthMethod;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an authentication method: GET /auth-method/{auth_method_id}.
 */
class GetAuthMethodRequest extends ItemRequest
{
    protected ?string $dto = AuthMethod::class;

    public function __construct(protected int $authMethodId) {}

    public function resolveEndpoint(): string
    {
        return '/auth-method/'.$this->authMethodId;
    }
}
