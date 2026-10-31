<?php

namespace spkm\ClearPass\Resources\EndpointVisibility;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\EndpointVisibility\OnGuardSettings;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\EndpointVisibility\OnGuardSettings\CreateOnGuardSettingsRequest;
use spkm\ClearPass\Requests\EndpointVisibility\OnGuardSettings\GetOnGuardSettingsRequest;
use spkm\ClearPass\Resources\SingletonResource;

/**
 * Manage OnGuard settings, from ClearPass::endpointVisibility()->onGuardSettings().
 *
 * @extends SingletonResource<OnGuardSettings>
 */
class OnGuardSettingsResource extends SingletonResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, OnGuardSettings::class);
    }

    protected function getRequest(array $options): ClearPassRequest
    {
        return new GetOnGuardSettingsRequest;
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateOnGuardSettingsRequest($body, $options);
    }
}
