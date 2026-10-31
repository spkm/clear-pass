<?php

namespace spkm\ClearPass\Resources\EnforcementProfile;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\EnforcementProfile\VoIPProfile;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\EnforcementProfile\VoIPProfile\CreateVoIPProfileRequest;
use spkm\ClearPass\Requests\EnforcementProfile\VoIPProfile\DeleteVoIPProfileByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\VoIPProfile\DeleteVoIPProfileRequest;
use spkm\ClearPass\Requests\EnforcementProfile\VoIPProfile\GetVoIPProfileByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\VoIPProfile\GetVoIPProfileRequest;
use spkm\ClearPass\Requests\EnforcementProfile\VoIPProfile\GetVoIPProfilesRequest;
use spkm\ClearPass\Requests\EnforcementProfile\VoIPProfile\ReplaceVoIPProfileByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\VoIPProfile\ReplaceVoIPProfileRequest;
use spkm\ClearPass\Requests\EnforcementProfile\VoIPProfile\UpdateVoIPProfileByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\VoIPProfile\UpdateVoIPProfileRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage VoIP Profile, from ClearPass::enforcementProfile()->voipProfiles().
 *
 * @extends Builder<VoIPProfile>
 */
class VoIPProfileResource extends Builder
{
    public function __construct(ClearPassConnector $connector, protected string $productName)
    {
        parent::__construct($connector, VoIPProfile::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetVoIPProfilesRequest($this->productName, $query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateVoIPProfileRequest($this->productName, $body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetVoIPProfileRequest($this->productName, (int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateVoIPProfileRequest($this->productName, (int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceVoIPProfileRequest($this->productName, (int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteVoIPProfileRequest($this->productName, (int) $id, $options);
    }

    /**
     * Get a VoIP Profile by name: GET /enforcement-profile-dur/voip-profile/{product_name}/name/{name}.
     */
    public function findByName(string $name): ?VoIPProfile
    {
        return $this->fetchOrNull(new GetVoIPProfileByNameRequest($this->productName, $name));
    }

    /**
     * Update some fields of a VoIP Profile by name: PATCH /enforcement-profile-dur/voip-profile/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?VoIPProfile
    {
        return $this->fetch(new UpdateVoIPProfileByNameRequest($this->productName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a VoIP Profile by name: PUT /enforcement-profile-dur/voip-profile/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?VoIPProfile
    {
        return $this->fetch(new ReplaceVoIPProfileByNameRequest($this->productName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a VoIP Profile by name: DELETE /enforcement-profile-dur/voip-profile/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteVoIPProfileByNameRequest($this->productName, $name, $options));

        return true;
    }
}
