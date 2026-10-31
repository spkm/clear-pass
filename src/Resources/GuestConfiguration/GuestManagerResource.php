<?php

namespace spkm\ClearPass\Resources\GuestConfiguration;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\GuestConfiguration\GuestManager;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\GuestConfiguration\GuestManager\CreateGuestManagerRequest;
use spkm\ClearPass\Requests\GuestConfiguration\GuestManager\GetGuestManagerRequest;
use spkm\ClearPass\Requests\GuestConfiguration\GuestManager\UpdateGuestManagerRequest;
use spkm\ClearPass\Resources\SingletonResource;

/**
 * Manage settings in Configuration -> Guest Manager, from ClearPass::guestConfiguration()->guestManager().
 *
 * @extends SingletonResource<GuestManager>
 */
class GuestManagerResource extends SingletonResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, GuestManager::class);
    }

    protected function getRequest(array $options): ClearPassRequest
    {
        return new GetGuestManagerRequest;
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateGuestManagerRequest($body, $options);
    }

    protected function updateRequest(array $body, array $options): ClearPassRequest
    {
        return new UpdateGuestManagerRequest($body, $options);
    }
}
