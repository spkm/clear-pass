<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\OnGuardSettings;

use spkm\ClearPass\Data\EndpointVisibility\OnGuardSettings;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get OnGuard settings: GET /onguard/settings.
 */
class GetOnGuardSettingsRequest extends ItemRequest
{
    protected ?string $dto = OnGuardSettings::class;

    public function resolveEndpoint(): string
    {
        return '/onguard/settings';
    }
}
