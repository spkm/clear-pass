<?php

namespace spkm\ClearPass\Requests\Identities\ApiClient;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Identities\ApiClient;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of an API client: PATCH /api-client/{client_id}.
 */
class UpdateApiClientRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

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
