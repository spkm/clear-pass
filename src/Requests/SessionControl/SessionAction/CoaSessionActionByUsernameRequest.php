<?php

namespace spkm\ClearPass\Requests\SessionControl\SessionAction;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\SessionControl\SessionActionList;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Performs active session reauthorize with a synchronous or asynchronous action & filter by username: POST /session-action/coa/username/{username}.
 */
class CoaSessionActionByUsernameRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = SessionActionList::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options: async (required)
     */
    public function __construct(protected string $username, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/session-action/coa/username/'.rawurlencode((string) $this->username);
    }
}
