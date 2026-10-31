<?php

namespace spkm\ClearPass\Requests\PolicyElements\AuthSource;

use spkm\ClearPass\Data\PolicyElements\AuthSource;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an authentication source by name: GET /auth-source/name/{name}.
 */
class GetAuthSourceByNameRequest extends ItemRequest
{
    protected ?string $dto = AuthSource::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/auth-source/name/'.rawurlencode((string) $this->name);
    }
}
