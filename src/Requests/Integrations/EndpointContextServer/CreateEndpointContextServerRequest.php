<?php

namespace spkm\ClearPass\Requests\Integrations\EndpointContextServer;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Integrations\EndpointContextServer;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new endpoint context server: POST /endpoint-context-server.
 */
class CreateEndpointContextServerRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = EndpointContextServer::class;

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
        return '/endpoint-context-server';
    }
}
