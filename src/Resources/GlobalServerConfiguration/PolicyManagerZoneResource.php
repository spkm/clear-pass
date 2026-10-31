<?php

namespace spkm\ClearPass\Resources\GlobalServerConfiguration;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\GlobalServerConfiguration\PolicyManagerZone;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\PolicyManagerZone\CreatePolicyManagerZoneRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\PolicyManagerZone\DeletePolicyManagerZoneByNameRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\PolicyManagerZone\DeletePolicyManagerZoneRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\PolicyManagerZone\GetPolicyManagerZoneByNameRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\PolicyManagerZone\GetPolicyManagerZoneRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\PolicyManagerZone\GetPolicyManagerZonesRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\PolicyManagerZone\ReplacePolicyManagerZoneByNameRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\PolicyManagerZone\ReplacePolicyManagerZoneRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage Policy Manager Zones, from ClearPass::globalServerConfiguration()->policyManagerZones().
 *
 * @extends Builder<PolicyManagerZone>
 */
class PolicyManagerZoneResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, PolicyManagerZone::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetPolicyManagerZonesRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreatePolicyManagerZoneRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetPolicyManagerZoneRequest((int) $id);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplacePolicyManagerZoneRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeletePolicyManagerZoneRequest((int) $id, $options);
    }

    /**
     * Get Policy Manager Zone by name: GET /server/policy-manager-zones/name/{name}.
     */
    public function findByName(string $name): ?PolicyManagerZone
    {
        return $this->fetchOrNull(new GetPolicyManagerZoneByNameRequest($name));
    }

    /**
     * Update Policy Manager Zone by name: PUT /server/policy-manager-zones/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?PolicyManagerZone
    {
        return $this->fetch(new ReplacePolicyManagerZoneByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete Policy Manager Zone by name: DELETE /server/policy-manager-zones/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeletePolicyManagerZoneByNameRequest($name, $options));

        return true;
    }
}
