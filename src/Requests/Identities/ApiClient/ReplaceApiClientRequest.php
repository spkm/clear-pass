<?php

namespace spkm\ClearPass\Requests\Identities\ApiClient;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Identities\ApiClient;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace an API client: PUT /api-client/{client_id}.
 */
class ReplaceApiClientRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = ApiClient::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int|string $clientId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/api-client/'.rawurlencode((string) $this->clientId);
    }
}
