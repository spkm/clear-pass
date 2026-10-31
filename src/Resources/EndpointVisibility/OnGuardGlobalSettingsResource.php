<?php

namespace spkm\ClearPass\Resources\EndpointVisibility;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\EndpointVisibility\OnGuardGlobalSettings;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\EndpointVisibility\OnGuardGlobalSettings\CreateOnGuardGlobalSettingsRequest;
use spkm\ClearPass\Requests\EndpointVisibility\OnGuardGlobalSettings\GetOnGuardGlobalSettingsRequest;
use spkm\ClearPass\Resources\SingletonResource;

/**
 * Manage OnGuard global settings, from ClearPass::endpointVisibility()->onGuardGlobalSettings().
 *
 * @extends SingletonResource<OnGuardGlobalSettings>
 */
class OnGuardGlobalSettingsResource extends SingletonResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, OnGuardGlobalSettings::class);
    }

    protected function getRequest(array $options): ClearPassRequest
    {
        return new GetOnGuardGlobalSettingsRequest;
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateOnGuardGlobalSettingsRequest($body, $options);
    }
}
