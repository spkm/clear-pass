<?php

namespace spkm\ClearPass\Resources\Identities;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Resources\BaseResource;

/**
 * The Identities API: ClearPass::identities().
 *
 * @extends BaseResource<Data>
 */
class IdentitiesResources extends BaseResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Manage API clients at Administration -> API Services -> API Clients.
     */
    public function apiClients(): ApiClientResource
    {
        return new ApiClientResource($this->connector);
    }

    /**
     * Manage deny listed users.
     */
    public function denyListedUsers(): DenyListedUsersResource
    {
        return new DenyListedUsersResource($this->connector);
    }

    /**
     * Manage device accounts.
     */
    public function devices(): DeviceResource
    {
        return new DeviceResource($this->connector);
    }

    /**
     * Manage endpoints.
     */
    public function endpoints(): EndpointResource
    {
        return new EndpointResource($this->connector);
    }

    /**
     * Manage external accounts.
     */
    public function externalAccounts(): ExternalAccountResource
    {
        return new ExternalAccountResource($this->connector);
    }

    /**
     * Manage guest accounts.
     */
    public function guestUsers(): GuestUserResource
    {
        return new GuestUserResource($this->connector);
    }

    /**
     * Manage local users.
     */
    public function localUsers(): LocalUserResource
    {
        return new LocalUserResource($this->connector);
    }

    /**
     * Manage static host lists.
     */
    public function staticHostLists(): StaticHostListResource
    {
        return new StaticHostListResource($this->connector);
    }
}
