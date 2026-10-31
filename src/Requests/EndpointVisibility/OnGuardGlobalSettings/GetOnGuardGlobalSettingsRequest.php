<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\OnGuardGlobalSettings;

use spkm\ClearPass\Data\EndpointVisibility\OnGuardGlobalSettings;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get OnGuard global settings: GET /onguard/global-settings.
 */
class GetOnGuardGlobalSettingsRequest extends ItemRequest
{
    protected ?string $dto = OnGuardGlobalSettings::class;

    public function resolveEndpoint(): string
    {
        return '/onguard/global-settings';
    }
}
