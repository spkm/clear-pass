<?php

namespace spkm\ClearPass\Requests\Integrations\EndpointContextServer;

use Saloon\Enums\Method;
use spkm\ClearPass\Data\Integrations\EndpointContextServer;
use spkm\ClearPass\Requests\ActionRequest;

/**
 * Trigger polling for an endpoint context server: PATCH /endpoint-context-server/{endpoint_context_server_id}/trigger-poll.
 */
class TriggerPollEndpointContextServerRequest extends ActionRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = EndpointContextServer::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int|string $endpointContextServerId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/endpoint-context-server/'.rawurlencode((string) $this->endpointContextServerId).'/trigger-poll';
    }
}
