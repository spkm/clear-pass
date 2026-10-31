<?php

namespace spkm\ClearPass\Resources\Identities;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\Identities\StaticHostList;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\Identities\StaticHostList\CreateStaticHostListRequest;
use spkm\ClearPass\Requests\Identities\StaticHostList\DeleteStaticHostListByNameRequest;
use spkm\ClearPass\Requests\Identities\StaticHostList\DeleteStaticHostListRequest;
use spkm\ClearPass\Requests\Identities\StaticHostList\GetStaticHostListByNameRequest;
use spkm\ClearPass\Requests\Identities\StaticHostList\GetStaticHostListRequest;
use spkm\ClearPass\Requests\Identities\StaticHostList\GetStaticHostListsRequest;
use spkm\ClearPass\Requests\Identities\StaticHostList\ReplaceStaticHostListByNameRequest;
use spkm\ClearPass\Requests\Identities\StaticHostList\ReplaceStaticHostListRequest;
use spkm\ClearPass\Requests\Identities\StaticHostList\UpdateStaticHostListByNameRequest;
use spkm\ClearPass\Requests\Identities\StaticHostList\UpdateStaticHostListRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage static host lists, from ClearPass::identities()->staticHostLists().
 *
 * @extends Builder<StaticHostList>
 */
class StaticHostListResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, StaticHostList::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetStaticHostListsRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateStaticHostListRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetStaticHostListRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateStaticHostListRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceStaticHostListRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteStaticHostListRequest((int) $id, $options);
    }

    /**
     * Get a static host list by name: GET /static-host-list/name/{name}.
     */
    public function findByName(string $name): ?StaticHostList
    {
        return $this->fetchOrNull(new GetStaticHostListByNameRequest($name));
    }

    /**
     * Update some fields of a static host list by name: PATCH /static-host-list/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?StaticHostList
    {
        return $this->fetch(new UpdateStaticHostListByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a static host list by name: PUT /static-host-list/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?StaticHostList
    {
        return $this->fetch(new ReplaceStaticHostListByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a static host list by name: DELETE /static-host-list/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteStaticHostListByNameRequest($name, $options));

        return true;
    }
}
