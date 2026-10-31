<?php

namespace spkm\ClearPass\Resources\LocalServerConfiguration;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\LocalServerConfiguration\AccessControl;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;
use spkm\ClearPass\Requests\LocalServerConfiguration\AccessControl\DeleteAccessControlByResourceNameRequest;
use spkm\ClearPass\Requests\LocalServerConfiguration\AccessControl\GetAccessControlByResourceNameRequest;
use spkm\ClearPass\Requests\LocalServerConfiguration\AccessControl\GetAccessControlsRequest;
use spkm\ClearPass\Requests\LocalServerConfiguration\AccessControl\ReplaceAccessControlByResourceNameRequest;

/**
 * Manage Application access controls, from ClearPass::localServerConfiguration()->accessControls().
 *
 * @extends Builder<AccessControl>
 */
class AccessControlResource extends Builder
{
    public function __construct(ClearPassConnector $connector, protected string $serverUuid)
    {
        parent::__construct($connector, AccessControl::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAccessControlsRequest($this->serverUuid, $query);
    }

    /**
     * Get an application access control by resource name: GET /server/access-control/{server_uuid}/{resource_name}.
     */
    public function findByResourceName(string $resourceName): ?AccessControl
    {
        return $this->fetchOrNull(new GetAccessControlByResourceNameRequest($this->serverUuid, $resourceName));
    }

    /**
     * Replace an application access controls by resource name: PUT /server/access-control/{server_uuid}/{resource_name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByResourceName(string $resourceName, array|Data $attributes = [], array $options = []): ?AccessControl
    {
        return $this->fetch(new ReplaceAccessControlByResourceNameRequest($this->serverUuid, $resourceName, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete an application access control by resource name: DELETE /server/access-control/{server_uuid}/{resource_name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByResourceName(string $resourceName, array $options = []): bool
    {
        $this->fetch(new DeleteAccessControlByResourceNameRequest($this->serverUuid, $resourceName, $options));

        return true;
    }
}
