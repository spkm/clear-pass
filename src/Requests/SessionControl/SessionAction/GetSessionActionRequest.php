<?php

namespace spkm\ClearPass\Requests\SessionControl\SessionAction;

use spkm\ClearPass\Data\SessionControl\SessionActionList;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Returns the current status of a disconnected or reauthorized active session by the action ID: GET /session-action/{action_id}.
 */
class GetSessionActionRequest extends ItemRequest
{
    protected ?string $dto = SessionActionList::class;

    public function __construct(protected string $actionId) {}

    public function resolveEndpoint(): string
    {
        return '/session-action/'.rawurlencode((string) $this->actionId);
    }
}
