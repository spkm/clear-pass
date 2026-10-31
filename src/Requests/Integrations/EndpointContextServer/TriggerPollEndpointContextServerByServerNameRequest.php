<?php

namespace spkm\ClearPass\Requests\Integrations\EndpointContextServer;

use Saloon\Enums\Method;
use spkm\ClearPass\Data\Integrations\EndpointContextServer;
use spkm\ClearPass\Requests\ActionRequest;

/**
 * Trigger polling for an endpoint context server by server name: PATCH /endpoint-context-server/server-name/{server_name}/trigger-poll.
 */
class TriggerPollEndpointContextServerByServerNameRequest extends ActionRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = EndpointContextServer::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serverName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/endpoint-context-server/server-name/'.rawurlencode((string) $this->serverName).'/trigger-poll';
    }
}
