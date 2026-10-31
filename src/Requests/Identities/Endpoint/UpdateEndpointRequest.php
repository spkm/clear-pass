<?php

namespace spkm\ClearPass\Requests\Identities\Endpoint;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Identities\Endpoint;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of an endpoint: PATCH /endpoint/{endpoint_id}.
 */
class UpdateEndpointRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

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
