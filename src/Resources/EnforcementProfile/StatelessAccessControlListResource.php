<?php

namespace spkm\ClearPass\Resources\EnforcementProfile;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\EnforcementProfile\StatelessAccessControlList;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\EnforcementProfile\StatelessAccessControlList\CreateStatelessAccessControlListRequest;
use spkm\ClearPass\Requests\EnforcementProfile\StatelessAccessControlList\DeleteStatelessAccessControlListByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\StatelessAccessControlList\DeleteStatelessAccessControlListRequest;
use spkm\ClearPass\Requests\EnforcementProfile\StatelessAccessControlList\GetStatelessAccessControlListByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\StatelessAccessControlList\GetStatelessAccessControlListRequest;
use spkm\ClearPass\Requests\EnforcementProfile\StatelessAccessControlList\GetStatelessAccessControlListsRequest;
use spkm\ClearPass\Requests\EnforcementProfile\StatelessAccessControlList\ReplaceStatelessAccessControlListByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\StatelessAccessControlList\ReplaceStatelessAccessControlListRequest;
use spkm\ClearPass\Requests\EnforcementProfile\StatelessAccessControlList\UpdateStatelessAccessControlListByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\StatelessAccessControlList\UpdateStatelessAccessControlListRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage Stateless Access Control List, from ClearPass::enforcementProfile()->statelessAccessControlLists().
 *
 * @extends Builder<StatelessAccessControlList>
 */
class StatelessAccessControlListResource extends Builder
{
    public function __construct(ClearPassConnector $connector, protected string $productName)
    {
        parent::__construct($connector, StatelessAccessControlList::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetStatelessAccessControlListsRequest($this->productName, $query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateStatelessAccessControlListRequest($this->productName, $body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetStatelessAccessControlListRequest($this->productName, (int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateStatelessAccessControlListRequest($this->productName, (int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceStatelessAccessControlListRequest($this->productName, (int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteStatelessAccessControlListRequest($this->productName, (int) $id, $options);
    }

    /**
     * Get a Stateless Access Control List by name: GET /enforcement-profile-dur/stateless-access-control-list/{product_name}/name/{name}.
     */
    public function findByName(string $name): ?StatelessAccessControlList
    {
        return $this->fetchOrNull(new GetStatelessAccessControlListByNameRequest($this->productName, $name));
    }

    /**
     * Update some fields of a Stateless Access Control List by name: PATCH /enforcement-profile-dur/stateless-access-control-list/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?StatelessAccessControlList
    {
        return $this->fetch(new UpdateStatelessAccessControlListByNameRequest($this->productName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a Stateless Access Control List by name: PUT /enforcement-profile-dur/stateless-access-control-list/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?StatelessAccessControlList
    {
        return $this->fetch(new ReplaceStatelessAccessControlListByNameRequest($this->productName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a Stateless Access Control List by name: DELETE /enforcement-profile-dur/stateless-access-control-list/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteStatelessAccessControlListByNameRequest($this->productName, $name, $options));

        return true;
    }
}
