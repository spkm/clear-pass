<?php

namespace spkm\ClearPass\Resources\EnforcementProfile;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\EnforcementProfile\EnforcementProfile;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\EnforcementProfile\EnforcementProfile\CreateEnforcementProfileRequest;
use spkm\ClearPass\Requests\EnforcementProfile\EnforcementProfile\DeleteEnforcementProfileByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\EnforcementProfile\DeleteEnforcementProfileRequest;
use spkm\ClearPass\Requests\EnforcementProfile\EnforcementProfile\GetEnforcementProfileByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\EnforcementProfile\GetEnforcementProfileRequest;
use spkm\ClearPass\Requests\EnforcementProfile\EnforcementProfile\GetEnforcementProfilesRequest;
use spkm\ClearPass\Requests\EnforcementProfile\EnforcementProfile\ReplaceEnforcementProfileByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\EnforcementProfile\ReplaceEnforcementProfileRequest;
use spkm\ClearPass\Requests\EnforcementProfile\EnforcementProfile\UpdateEnforcementProfileByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\EnforcementProfile\UpdateEnforcementProfileRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage Enforcement Profiles, from ClearPass::enforcementProfile()->enforcementProfiles().
 *
 * @extends Builder<EnforcementProfile>
 */
class EnforcementProfileResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, EnforcementProfile::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetEnforcementProfilesRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateEnforcementProfileRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetEnforcementProfileRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateEnforcementProfileRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceEnforcementProfileRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteEnforcementProfileRequest((int) $id, $options);
    }

    /**
     * Get an Enforcement Profile by name: GET /enforcement-profile/name/{name}.
     */
    public function findByName(string $name): ?EnforcementProfile
    {
        return $this->fetchOrNull(new GetEnforcementProfileByNameRequest($name));
    }

    /**
     * Update an Enforcement Profile by name: PATCH /enforcement-profile/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?EnforcementProfile
    {
        return $this->fetch(new UpdateEnforcementProfileByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace an Enforcement Profile by name: PUT /enforcement-profile/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?EnforcementProfile
    {
        return $this->fetch(new ReplaceEnforcementProfileByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete an Enforcement Profile by name: DELETE /enforcement-profile/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteEnforcementProfileByNameRequest($name, $options));

        return true;
    }
}
