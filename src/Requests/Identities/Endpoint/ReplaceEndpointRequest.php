<?php

namespace spkm\ClearPass\Requests\Identities\Endpoint;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Identities\Endpoint;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace an endpoint: PUT /endpoint/{endpoint_id}.
 */
class ReplaceEndpointRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = Endpoint::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $endpointId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/endpoint/'.$this->endpointId;
    }
}
