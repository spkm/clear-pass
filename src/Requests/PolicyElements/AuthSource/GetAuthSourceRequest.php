<?php

namespace spkm\ClearPass\Requests\PolicyElements\AuthSource;

use spkm\ClearPass\Data\PolicyElements\AuthSource;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an authentication source: GET /auth-source/{auth_source_id}.
 */
class GetAuthSourceRequest extends ItemRequest
{
    protected ?string $dto = AuthSource::class;

    public function __construct(protected int $authSourceId) {}

    public function resolveEndpoint(): string
    {
        return '/auth-source/'.$this->authSourceId;
    }
}
