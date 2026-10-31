<?php

namespace spkm\ClearPass\Requests\SessionControl\ActiveSession;

use spkm\ClearPass\Data\SessionControl\ActiveSession;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an active session: GET /session/{id}.
 */
class GetActiveSessionRequest extends ItemRequest
{
    protected ?string $dto = ActiveSession::class;

    public function __construct(protected int|string $id) {}

    public function resolveEndpoint(): string
    {
        return '/session/'.rawurlencode((string) $this->id);
    }
}
