<?php

namespace spkm\ClearPass\Requests\SessionControl\SessionAction;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\SessionControl\SessionActionList;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Performs active session disconnect with a synchronous or asynchronous action & filter by client-ip-address: POST /session-action/disconnect/ip/{client_ip_address}.
 */
class DisconnectSessionActionByIpRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = SessionActionList::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options: async (required)
     */
    public function __construct(protected string $clientIpAddress, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/session-action/disconnect/ip/'.rawurlencode((string) $this->clientIpAddress);
    }
}
