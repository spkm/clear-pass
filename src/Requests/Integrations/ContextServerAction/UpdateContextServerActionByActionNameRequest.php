<?php

namespace spkm\ClearPass\Requests\Integrations\ContextServerAction;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Integrations\ContextServerAction;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of a Context Server Action by name: PATCH /context-server-action/{server_type}/action-name/{action_name}.
 */
class UpdateContextServerActionByActionNameRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = ContextServerAction::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serverType, protected string $actionName, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/context-server-action/'.rawurlencode((string) $this->serverType).'/action-name/'.rawurlencode((string) $this->actionName);
    }
}
