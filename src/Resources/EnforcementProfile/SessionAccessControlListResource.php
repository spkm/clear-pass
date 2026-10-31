<?php

namespace spkm\ClearPass\Resources\EnforcementProfile;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\EnforcementProfile\SessionAccessControlList;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\EnforcementProfile\SessionAccessControlList\CreateSessionAccessControlListRequest;
use spkm\ClearPass\Requests\EnforcementProfile\SessionAccessControlList\DeleteSessionAccessControlListByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\SessionAccessControlList\DeleteSessionAccessControlListRequest;
use spkm\ClearPass\Requests\EnforcementProfile\SessionAccessControlList\GetSessionAccessControlListByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\SessionAccessControlList\GetSessionAccessControlListRequest;
use spkm\ClearPass\Requests\EnforcementProfile\SessionAccessControlList\GetSessionAccessControlListsRequest;
use spkm\ClearPass\Requests\EnforcementProfile\SessionAccessControlList\ReplaceSessionAccessControlListByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\SessionAccessControlList\ReplaceSessionAccessControlListRequest;
use spkm\ClearPass\Requests\EnforcementProfile\SessionAccessControlList\UpdateSessionAccessControlListByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\SessionAccessControlList\UpdateSessionAccessControlListRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage Session Access Control List, from ClearPass::enforcementProfile()->sessionAccessControlLists().
 *
 * @extends Builder<SessionAccessControlList>
 */
class SessionAccessControlListResource extends Builder
{
    public function __construct(ClearPassConnector $connector, protected string $productName)
    {
        parent::__construct($connector, SessionAccessControlList::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSessionAccessControlListsRequest($this->productName, $query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateSessionAccessControlListRequest($this->productName, $body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetSessionAccessControlListRequest($this->productName, (int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateSessionAccessControlListRequest($this->productName, (int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceSessionAccessControlListRequest($this->productName, (int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteSessionAccessControlListRequest($this->productName, (int) $id, $options);
    }

    /**
     * Get a Session Access Control List by name: GET /enforcement-profile-dur/session-access-control-list/{product_name}/name/{name}.
     */
    public function findByName(string $name): ?SessionAccessControlList
    {
        return $this->fetchOrNull(new GetSessionAccessControlListByNameRequest($this->productName, $name));
    }

    /**
     * Update some fields of a Session Access Control List by name: PATCH /enforcement-profile-dur/session-access-control-list/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?SessionAccessControlList
    {
        return $this->fetch(new UpdateSessionAccessControlListByNameRequest($this->productName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a Session Access Control List by name: PUT /enforcement-profile-dur/session-access-control-list/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?SessionAccessControlList
    {
        return $this->fetch(new ReplaceSessionAccessControlListByNameRequest($this->productName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a Session Access Control List by name: DELETE /enforcement-profile-dur/session-access-control-list/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteSessionAccessControlListByNameRequest($this->productName, $name, $options));

        return true;
    }
}
