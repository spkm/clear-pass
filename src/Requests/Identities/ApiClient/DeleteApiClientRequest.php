<?php

namespace spkm\ClearPass\Requests\Identities\ApiClient;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an API client: DELETE /api-client/{client_id}.
 */
class DeleteApiClientRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int|string $clientId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/api-client/'.rawurlencode((string) $this->clientId);
    }
}
