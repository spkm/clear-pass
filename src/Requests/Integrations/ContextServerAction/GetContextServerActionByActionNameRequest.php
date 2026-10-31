<?php

namespace spkm\ClearPass\Requests\Integrations\ContextServerAction;

use spkm\ClearPass\Data\Integrations\ContextServerAction;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Context Server Action by name: GET /context-server-action/{server_type}/action-name/{action_name}.
 */
class GetContextServerActionByActionNameRequest extends ItemRequest
{
    protected ?string $dto = ContextServerAction::class;

    public function __construct(protected string $serverType, protected string $actionName) {}

    public function resolveEndpoint(): string
    {
        return '/context-server-action/'.rawurlencode((string) $this->serverType).'/action-name/'.rawurlencode((string) $this->actionName);
    }
}
