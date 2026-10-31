<?php

namespace spkm\ClearPass\Resources\GlobalServerConfiguration;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\GlobalServerConfiguration\OperatorProfile;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\OperatorProfile\CreateOperatorProfileRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\OperatorProfile\DeleteOperatorProfileByNameRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\OperatorProfile\DeleteOperatorProfileRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\OperatorProfile\GetOperatorProfileByNameRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\OperatorProfile\GetOperatorProfileRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\OperatorProfile\GetOperatorProfilesRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\OperatorProfile\ReplaceOperatorProfileByNameRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\OperatorProfile\ReplaceOperatorProfileRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\OperatorProfile\UpdateOperatorProfileByNameRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\OperatorProfile\UpdateOperatorProfileRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage operator profiles, from ClearPass::globalServerConfiguration()->operatorProfiles().
 *
 * @extends Builder<OperatorProfile>
 */
class OperatorProfileResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, OperatorProfile::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetOperatorProfilesRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateOperatorProfileRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetOperatorProfileRequest($id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateOperatorProfileRequest($id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceOperatorProfileRequest($id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteOperatorProfileRequest($id, $options);
    }

    /**
     * Get an operator profile by name: GET /operator-profile/name/{name}.
     */
    public function findByName(string $name): ?OperatorProfile
    {
        return $this->fetchOrNull(new GetOperatorProfileByNameRequest($name));
    }

    /**
     * Update an operator profile by name: PATCH /operator-profile/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?OperatorProfile
    {
        return $this->fetch(new UpdateOperatorProfileByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace an operator profile by name: PUT /operator-profile/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?OperatorProfile
    {
        return $this->fetch(new ReplaceOperatorProfileByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete an operator profile by name: DELETE /operator-profile/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteOperatorProfileByNameRequest($name, $options));

        return true;
    }
}
