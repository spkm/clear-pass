<?php

namespace spkm\ClearPass\Requests\GuestConfiguration\GuestAuthenticationConfiguration;

use spkm\ClearPass\Data\GuestConfiguration\GuestAuthenticationConfiguration;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Return settings from Configuration -> Authentication: GET /guest/authentication.
 */
class GetGuestAuthenticationConfigurationRequest extends ItemRequest
{
    protected ?string $dto = GuestAuthenticationConfiguration::class;

    public function resolveEndpoint(): string
    {
        return '/guest/authentication';
    }
}
