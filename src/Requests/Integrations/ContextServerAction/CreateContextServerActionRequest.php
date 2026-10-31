<?php

namespace spkm\ClearPass\Requests\Integrations\ContextServerAction;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Integrations\ContextServerAction;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new Context Server Action: POST /context-server-action.
 */
class CreateContextServerActionRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = ContextServerAction::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/context-server-action';
    }
}
