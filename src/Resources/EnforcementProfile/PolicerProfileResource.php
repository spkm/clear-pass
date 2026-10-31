<?php

namespace spkm\ClearPass\Resources\EnforcementProfile;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\EnforcementProfile\PolicerProfile;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\EnforcementProfile\PolicerProfile\CreatePolicerProfileRequest;
use spkm\ClearPass\Requests\EnforcementProfile\PolicerProfile\DeletePolicerProfileByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\PolicerProfile\DeletePolicerProfileRequest;
use spkm\ClearPass\Requests\EnforcementProfile\PolicerProfile\GetPolicerProfileByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\PolicerProfile\GetPolicerProfileRequest;
use spkm\ClearPass\Requests\EnforcementProfile\PolicerProfile\GetPolicerProfilesRequest;
use spkm\ClearPass\Requests\EnforcementProfile\PolicerProfile\ReplacePolicerProfileByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\PolicerProfile\ReplacePolicerProfileRequest;
use spkm\ClearPass\Requests\EnforcementProfile\PolicerProfile\UpdatePolicerProfileByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\PolicerProfile\UpdatePolicerProfileRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage Policer Profile, from ClearPass::enforcementProfile()->policerProfiles().
 *
 * @extends Builder<PolicerProfile>
 */
class PolicerProfileResource extends Builder
{
    public function __construct(ClearPassConnector $connector, protected string $productName)
    {
        parent::__construct($connector, PolicerProfile::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetPolicerProfilesRequest($this->productName, $query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreatePolicerProfileRequest($this->productName, $body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetPolicerProfileRequest($this->productName, (int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdatePolicerProfileRequest($this->productName, (int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplacePolicerProfileRequest($this->productName, (int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeletePolicerProfileRequest($this->productName, (int) $id, $options);
    }

    /**
     * Get a Policer Profile by name: GET /enforcement-profile-dur/policer-profile/{product_name}/name/{name}.
     */
    public function findByName(string $name): ?PolicerProfile
    {
        return $this->fetchOrNull(new GetPolicerProfileByNameRequest($this->productName, $name));
    }

    /**
     * Update some fields of a Policer Profile by name: PATCH /enforcement-profile-dur/policer-profile/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?PolicerProfile
    {
        return $this->fetch(new UpdatePolicerProfileByNameRequest($this->productName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a Policer Profile by name: PUT /enforcement-profile-dur/policer-profile/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?PolicerProfile
    {
        return $this->fetch(new ReplacePolicerProfileByNameRequest($this->productName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a Policer Profile by name: DELETE /enforcement-profile-dur/policer-profile/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeletePolicerProfileByNameRequest($this->productName, $name, $options));

        return true;
    }
}
