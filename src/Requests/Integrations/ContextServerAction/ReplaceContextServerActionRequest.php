<?php

namespace spkm\ClearPass\Requests\Integrations\ContextServerAction;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Integrations\ContextServerAction;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a Context Server Action: PUT /context-server-action/{context_server_action_id}.
 */
class ReplaceContextServerActionRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = ContextServerAction::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $contextServerActionId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/context-server-action/'.$this->contextServerActionId;
    }
}
