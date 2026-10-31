<?php

namespace spkm\ClearPass\Requests\SessionControl\SessionAction;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\SessionControl\SessionActionList;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Performs active session disconnect with a synchronous or asynchronous action & filter by mac-address: POST /session-action/disconnect/mac/{mac_address}.
 */
class DisconnectSessionActionByMacRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = SessionActionList::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options: async (required)
     */
    public function __construct(protected string $macAddress, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/session-action/disconnect/mac/'.rawurlencode((string) $this->macAddress);
    }
}
