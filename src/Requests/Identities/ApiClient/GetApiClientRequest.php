<?php

namespace spkm\ClearPass\Requests\Identities\ApiClient;

use spkm\ClearPass\Data\Identities\ApiClient;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an API client: GET /api-client/{client_id}.
 */
class GetApiClientRequest extends ItemRequest
{
    protected ?string $dto = ApiClient::class;

    public function __construct(protected int|string $clientId) {}

    public function resolveEndpoint(): string
    {
        return '/api-client/'.rawurlencode((string) $this->clientId);
    }
}
