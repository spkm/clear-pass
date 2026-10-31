<?php

namespace spkm\ClearPass\Resources\EnforcementProfile;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\EnforcementProfile\CaptivePortalProfile;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\EnforcementProfile\CaptivePortalProfile\CreateCaptivePortalProfileRequest;
use spkm\ClearPass\Requests\EnforcementProfile\CaptivePortalProfile\DeleteCaptivePortalProfileByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\CaptivePortalProfile\DeleteCaptivePortalProfileRequest;
use spkm\ClearPass\Requests\EnforcementProfile\CaptivePortalProfile\GetCaptivePortalProfileByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\CaptivePortalProfile\GetCaptivePortalProfileRequest;
use spkm\ClearPass\Requests\EnforcementProfile\CaptivePortalProfile\GetCaptivePortalProfilesRequest;
use spkm\ClearPass\Requests\EnforcementProfile\CaptivePortalProfile\ReplaceCaptivePortalProfileByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\CaptivePortalProfile\ReplaceCaptivePortalProfileRequest;
use spkm\ClearPass\Requests\EnforcementProfile\CaptivePortalProfile\UpdateCaptivePortalProfileByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\CaptivePortalProfile\UpdateCaptivePortalProfileRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage Captive Portal Profile, from ClearPass::enforcementProfile()->captivePortalProfiles().
 *
 * @extends Builder<CaptivePortalProfile>
 */
class CaptivePortalProfileResource extends Builder
{
    public function __construct(ClearPassConnector $connector, protected string $productName)
    {
        parent::__construct($connector, CaptivePortalProfile::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetCaptivePortalProfilesRequest($this->productName, $query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateCaptivePortalProfileRequest($this->productName, $body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetCaptivePortalProfileRequest($this->productName, (int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateCaptivePortalProfileRequest($this->productName, (int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceCaptivePortalProfileRequest($this->productName, (int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteCaptivePortalProfileRequest($this->productName, (int) $id, $options);
    }

    /**
     * Get a Captive Portal Profile by name: GET /enforcement-profile-dur/captive-portal-profile/{product_name}/name/{name}.
     */
    public function findByName(string $name): ?CaptivePortalProfile
    {
        return $this->fetchOrNull(new GetCaptivePortalProfileByNameRequest($this->productName, $name));
    }

    /**
     * Update some fields of a Captive Portal Profile by name: PATCH /enforcement-profile-dur/captive-portal-profile/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?CaptivePortalProfile
    {
        return $this->fetch(new UpdateCaptivePortalProfileByNameRequest($this->productName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a Captive Portal Profile by name: PUT /enforcement-profile-dur/captive-portal-profile/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?CaptivePortalProfile
    {
        return $this->fetch(new ReplaceCaptivePortalProfileByNameRequest($this->productName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a Captive Portal Profile by name: DELETE /enforcement-profile-dur/captive-portal-profile/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteCaptivePortalProfileByNameRequest($this->productName, $name, $options));

        return true;
    }
}
