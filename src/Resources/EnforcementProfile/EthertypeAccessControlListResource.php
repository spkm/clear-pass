<?php

namespace spkm\ClearPass\Resources\EnforcementProfile;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\EnforcementProfile\EthertypeAccessControlList;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\EnforcementProfile\EthertypeAccessControlList\CreateEthertypeAccessControlListRequest;
use spkm\ClearPass\Requests\EnforcementProfile\EthertypeAccessControlList\DeleteEthertypeAccessControlListByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\EthertypeAccessControlList\DeleteEthertypeAccessControlListRequest;
use spkm\ClearPass\Requests\EnforcementProfile\EthertypeAccessControlList\GetEthertypeAccessControlListByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\EthertypeAccessControlList\GetEthertypeAccessControlListRequest;
use spkm\ClearPass\Requests\EnforcementProfile\EthertypeAccessControlList\GetEthertypeAccessControlListsRequest;
use spkm\ClearPass\Requests\EnforcementProfile\EthertypeAccessControlList\ReplaceEthertypeAccessControlListByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\EthertypeAccessControlList\ReplaceEthertypeAccessControlListRequest;
use spkm\ClearPass\Requests\EnforcementProfile\EthertypeAccessControlList\UpdateEthertypeAccessControlListByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\EthertypeAccessControlList\UpdateEthertypeAccessControlListRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage Ethertype Access Control List, from ClearPass::enforcementProfile()->ethertypeAccessControlLists().
 *
 * @extends Builder<EthertypeAccessControlList>
 */
class EthertypeAccessControlListResource extends Builder
{
    public function __construct(ClearPassConnector $connector, protected string $productName)
    {
        parent::__construct($connector, EthertypeAccessControlList::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetEthertypeAccessControlListsRequest($this->productName, $query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateEthertypeAccessControlListRequest($this->productName, $body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetEthertypeAccessControlListRequest($this->productName, (int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateEthertypeAccessControlListRequest($this->productName, (int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceEthertypeAccessControlListRequest($this->productName, (int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteEthertypeAccessControlListRequest($this->productName, (int) $id, $options);
    }

    /**
     * Get a Ethertype Access Control List by name: GET /enforcement-profile-dur/ethertype-access-control-list/{product_name}/name/{name}.
     */
    public function findByName(string $name): ?EthertypeAccessControlList
    {
        return $this->fetchOrNull(new GetEthertypeAccessControlListByNameRequest($this->productName, $name));
    }

    /**
     * Update a Ethertype Access Control List by name: PATCH /enforcement-profile-dur/ethertype-access-control-list/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?EthertypeAccessControlList
    {
        return $this->fetch(new UpdateEthertypeAccessControlListByNameRequest($this->productName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a Ethertype Access Control List by name: PUT /enforcement-profile-dur/ethertype-access-control-list/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?EthertypeAccessControlList
    {
        return $this->fetch(new ReplaceEthertypeAccessControlListByNameRequest($this->productName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a Ethertype Access Control List by name: DELETE /enforcement-profile-dur/ethertype-access-control-list/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteEthertypeAccessControlListByNameRequest($this->productName, $name, $options));

        return true;
    }
}
