<?php

namespace spkm\ClearPass\Resources\GuestConfiguration;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\GuestConfiguration\GuestAuthenticationConfiguration;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\GuestConfiguration\GuestAuthenticationConfiguration\CreateGuestAuthenticationConfigurationRequest;
use spkm\ClearPass\Requests\GuestConfiguration\GuestAuthenticationConfiguration\GetGuestAuthenticationConfigurationRequest;
use spkm\ClearPass\Requests\GuestConfiguration\GuestAuthenticationConfiguration\UpdateGuestAuthenticationConfigurationRequest;
use spkm\ClearPass\Resources\SingletonResource;

/**
 * Manage settings in Configuration -> Authentication, from ClearPass::guestConfiguration()->guestAuthenticationConfiguration().
 *
 * @extends SingletonResource<GuestAuthenticationConfiguration>
 */
class GuestAuthenticationConfigurationResource extends SingletonResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, GuestAuthenticationConfiguration::class);
    }

    protected function getRequest(array $options): ClearPassRequest
    {
        return new GetGuestAuthenticationConfigurationRequest;
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateGuestAuthenticationConfigurationRequest($body, $options);
    }

    protected function updateRequest(array $body, array $options): ClearPassRequest
    {
        return new UpdateGuestAuthenticationConfigurationRequest($body, $options);
    }
}
