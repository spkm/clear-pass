<?php

namespace spkm\ClearPass\Resources\EnforcementProfile;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\EnforcementProfile\MACAccessControlList;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\EnforcementProfile\MACAccessControlList\CreateMACAccessControlListRequest;
use spkm\ClearPass\Requests\EnforcementProfile\MACAccessControlList\DeleteMACAccessControlListByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\MACAccessControlList\DeleteMACAccessControlListRequest;
use spkm\ClearPass\Requests\EnforcementProfile\MACAccessControlList\GetMACAccessControlListByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\MACAccessControlList\GetMACAccessControlListRequest;
use spkm\ClearPass\Requests\EnforcementProfile\MACAccessControlList\GetMACAccessControlListsRequest;
use spkm\ClearPass\Requests\EnforcementProfile\MACAccessControlList\ReplaceMACAccessControlListByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\MACAccessControlList\ReplaceMACAccessControlListRequest;
use spkm\ClearPass\Requests\EnforcementProfile\MACAccessControlList\UpdateMACAccessControlListByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\MACAccessControlList\UpdateMACAccessControlListRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage MAC Access Control List, from ClearPass::enforcementProfile()->macAccessControlLists().
 *
 * @extends Builder<MACAccessControlList>
 */
class MACAccessControlListResource extends Builder
{
    public function __construct(ClearPassConnector $connector, protected string $productName)
    {
        parent::__construct($connector, MACAccessControlList::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetMACAccessControlListsRequest($this->productName, $query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateMACAccessControlListRequest($this->productName, $body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetMACAccessControlListRequest($this->productName, (int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateMACAccessControlListRequest($this->productName, (int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceMACAccessControlListRequest($this->productName, (int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteMACAccessControlListRequest($this->productName, (int) $id, $options);
    }

    /**
     * Get a MAC Access Control List by name: GET /enforcement-profile-dur/mac-access-control-list/{product_name}/name/{name}.
     */
    public function findByName(string $name): ?MACAccessControlList
    {
        return $this->fetchOrNull(new GetMACAccessControlListByNameRequest($this->productName, $name));
    }

    /**
     * Update some fields of a MAC Access Control List by name: PATCH /enforcement-profile-dur/mac-access-control-list/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?MACAccessControlList
    {
        return $this->fetch(new UpdateMACAccessControlListByNameRequest($this->productName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a MAC Access Control List by name: PUT /enforcement-profile-dur/mac-access-control-list/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?MACAccessControlList
    {
        return $this->fetch(new ReplaceMACAccessControlListByNameRequest($this->productName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a MAC Access Control List by name: DELETE /enforcement-profile-dur/mac-access-control-list/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteMACAccessControlListByNameRequest($this->productName, $name, $options));

        return true;
    }
}
