<?php

namespace spkm\ClearPass\Resources\Identities;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\Identities\ExternalAccount;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\Identities\ExternalAccount\CreateExternalAccountRequest;
use spkm\ClearPass\Requests\Identities\ExternalAccount\DeleteExternalAccountByNameRequest;
use spkm\ClearPass\Requests\Identities\ExternalAccount\DeleteExternalAccountRequest;
use spkm\ClearPass\Requests\Identities\ExternalAccount\GetExternalAccountByNameRequest;
use spkm\ClearPass\Requests\Identities\ExternalAccount\GetExternalAccountRequest;
use spkm\ClearPass\Requests\Identities\ExternalAccount\GetExternalAccountsRequest;
use spkm\ClearPass\Requests\Identities\ExternalAccount\ReplaceExternalAccountByNameRequest;
use spkm\ClearPass\Requests\Identities\ExternalAccount\ReplaceExternalAccountRequest;
use spkm\ClearPass\Requests\Identities\ExternalAccount\UpdateExternalAccountByNameRequest;
use spkm\ClearPass\Requests\Identities\ExternalAccount\UpdateExternalAccountRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage external accounts, from ClearPass::identities()->externalAccounts().
 *
 * @extends Builder<ExternalAccount>
 */
class ExternalAccountResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, ExternalAccount::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetExternalAccountsRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateExternalAccountRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetExternalAccountRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateExternalAccountRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceExternalAccountRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteExternalAccountRequest((int) $id, $options);
    }

    /**
     * Get an external account by name: GET /external-account/name/{name}.
     */
    public function findByName(string $name): ?ExternalAccount
    {
        return $this->fetchOrNull(new GetExternalAccountByNameRequest($name));
    }

    /**
     * Update some fields of an external account by name: PATCH /external-account/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?ExternalAccount
    {
        return $this->fetch(new UpdateExternalAccountByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace an external account by name: PUT /external-account/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?ExternalAccount
    {
        return $this->fetch(new ReplaceExternalAccountByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete an external account by name: DELETE /external-account/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteExternalAccountByNameRequest($name, $options));

        return true;
    }
}
