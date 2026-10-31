<?php

namespace spkm\ClearPass\Requests\Integrations\ContextServerAction;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a Context Server Action: DELETE /context-server-action/{context_server_action_id}.
 */
class DeleteContextServerActionRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $contextServerActionId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/context-server-action/'.$this->contextServerActionId;
    }
}
