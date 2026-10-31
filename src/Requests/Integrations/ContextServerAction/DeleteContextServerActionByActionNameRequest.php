<?php

namespace spkm\ClearPass\Requests\Integrations\ContextServerAction;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a Context Server Action by name: DELETE /context-server-action/{server_type}/action-name/{action_name}.
 */
class DeleteContextServerActionByActionNameRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serverType, protected string $actionName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/context-server-action/'.rawurlencode((string) $this->serverType).'/action-name/'.rawurlencode((string) $this->actionName);
    }
}
