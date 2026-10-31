<?php

namespace spkm\ClearPass\Requests\PolicyElements\AuthMethod;

use spkm\ClearPass\Data\PolicyElements\AuthMethod;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an authentication method by name: GET /auth-method/name/{name}.
 */
class GetAuthMethodByNameRequest extends ItemRequest
{
    protected ?string $dto = AuthMethod::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/auth-method/name/'.rawurlencode((string) $this->name);
    }
}
