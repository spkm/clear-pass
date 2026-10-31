<?php

namespace spkm\ClearPass\Requests\Identities\Endpoint;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Identities\Endpoint;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new endpoint: POST /endpoint.
 */
class CreateEndpointRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = Endpoint::class;

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
        return '/endpoint';
    }
}
