<?php

namespace spkm\ClearPass\Requests\Identities\ApiClient;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Identities\ApiClient;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new API client: POST /api-client.
 */
class CreateApiClientRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = ApiClient::class;

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
        return '/api-client';
    }
}
