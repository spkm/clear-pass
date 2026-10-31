<?php

namespace spkm\ClearPass\Resources\Identities;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Identities\ApiClient;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\Identities\ApiClient\CreateApiClientRequest;
use spkm\ClearPass\Requests\Identities\ApiClient\DeleteApiClientRequest;
use spkm\ClearPass\Requests\Identities\ApiClient\GetApiClientRequest;
use spkm\ClearPass\Requests\Identities\ApiClient\GetApiClientsRequest;
use spkm\ClearPass\Requests\Identities\ApiClient\ReplaceApiClientRequest;
use spkm\ClearPass\Requests\Identities\ApiClient\UpdateApiClientRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage API clients at Administration -> API Services -> API Clients, from ClearPass::identities()->apiClients().
 *
 * @extends Builder<ApiClient>
 */
class ApiClientResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, ApiClient::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetApiClientsRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateApiClientRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetApiClientRequest($id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateApiClientRequest($id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceApiClientRequest($id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteApiClientRequest($id, $options);
    }
}
