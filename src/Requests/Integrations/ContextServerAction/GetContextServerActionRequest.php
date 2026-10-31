<?php

namespace spkm\ClearPass\Requests\Integrations\ContextServerAction;

use spkm\ClearPass\Data\Integrations\ContextServerAction;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Context Server Action: GET /context-server-action/{context_server_action_id}.
 */
class GetContextServerActionRequest extends ItemRequest
{
    protected ?string $dto = ContextServerAction::class;

    public function __construct(protected int $contextServerActionId) {}

    public function resolveEndpoint(): string
    {
        return '/context-server-action/'.$this->contextServerActionId;
    }
}
