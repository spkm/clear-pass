<?php

namespace spkm\ClearPass\Resources\SessionControl;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\SessionControl\SessionActionList;
use spkm\ClearPass\Requests\SessionControl\SessionAction\CoaSessionActionByIpRequest;
use spkm\ClearPass\Requests\SessionControl\SessionAction\CoaSessionActionByMacRequest;
use spkm\ClearPass\Requests\SessionControl\SessionAction\CoaSessionActionByUsernameRequest;
use spkm\ClearPass\Requests\SessionControl\SessionAction\CoaSessionActionRequest;
use spkm\ClearPass\Requests\SessionControl\SessionAction\DisconnectSessionActionByIpRequest;
use spkm\ClearPass\Requests\SessionControl\SessionAction\DisconnectSessionActionByMacRequest;
use spkm\ClearPass\Requests\SessionControl\SessionAction\DisconnectSessionActionByUsernameRequest;
use spkm\ClearPass\Requests\SessionControl\SessionAction\DisconnectSessionActionRequest;
use spkm\ClearPass\Requests\SessionControl\SessionAction\GetSessionActionRequest;
use spkm\ClearPass\Resources\BaseResource;

/**
 * Manage Session Action Methods, from ClearPass::sessionControl()->sessionAction().
 *
 * @extends BaseResource<SessionActionList>
 */
class SessionActionResource extends BaseResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, SessionActionList::class);
    }

    /**
     * Performs active session disconnect with a synchronous or asynchronous action & filter by multiple fields: POST /session-action/disconnect.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options  Query options: async (required)
     */
    public function disconnect(array|Data $attributes = [], array $options = []): ?SessionActionList
    {
        return $this->fetch(new DisconnectSessionActionRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Performs active session disconnect with a synchronous or asynchronous action & filter by mac-address: POST /session-action/disconnect/mac/{mac_address}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options  Query options: async (required)
     */
    public function disconnectByMac(string $macAddress, array|Data $attributes = [], array $options = []): ?SessionActionList
    {
        return $this->fetch(new DisconnectSessionActionByMacRequest($macAddress, $this->payloadOf($attributes), $options));
    }

    /**
     * Performs active session disconnect with a synchronous or asynchronous action & filter by username: POST /session-action/disconnect/username/{username}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options  Query options: async (required)
     */
    public function disconnectByUsername(string $username, array|Data $attributes = [], array $options = []): ?SessionActionList
    {
        return $this->fetch(new DisconnectSessionActionByUsernameRequest($username, $this->payloadOf($attributes), $options));
    }

    /**
     * Performs active session disconnect with a synchronous or asynchronous action & filter by client-ip-address: POST /session-action/disconnect/ip/{client_ip_address}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options  Query options: async (required)
     */
    public function disconnectByIp(string $clientIpAddress, array|Data $attributes = [], array $options = []): ?SessionActionList
    {
        return $this->fetch(new DisconnectSessionActionByIpRequest($clientIpAddress, $this->payloadOf($attributes), $options));
    }

    /**
     * Performs active session reauthorize with a synchronous or asynchronous action & filter by multiple fields: POST /session-action/coa.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options  Query options: async (required)
     */
    public function coa(array|Data $attributes = [], array $options = []): ?SessionActionList
    {
        return $this->fetch(new CoaSessionActionRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Performs active session reauthorize with a synchronous or asynchronous action & filter by mac-address: POST /session-action/coa/mac/{mac_address}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options  Query options: async (required)
     */
    public function coaByMac(string $macAddress, array|Data $attributes = [], array $options = []): ?SessionActionList
    {
        return $this->fetch(new CoaSessionActionByMacRequest($macAddress, $this->payloadOf($attributes), $options));
    }

    /**
     * Performs active session reauthorize with a synchronous or asynchronous action & filter by username: POST /session-action/coa/username/{username}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options  Query options: async (required)
     */
    public function coaByUsername(string $username, array|Data $attributes = [], array $options = []): ?SessionActionList
    {
        return $this->fetch(new CoaSessionActionByUsernameRequest($username, $this->payloadOf($attributes), $options));
    }

    /**
     * Performs active session reauthorize with a synchronous or asynchronous action & filter by client-ip-address: POST /session-action/coa/ip/{client_ip_address}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options  Query options: async (required)
     */
    public function coaByIp(string $clientIpAddress, array|Data $attributes = [], array $options = []): ?SessionActionList
    {
        return $this->fetch(new CoaSessionActionByIpRequest($clientIpAddress, $this->payloadOf($attributes), $options));
    }

    /**
     * Returns the current status of a disconnected or reauthorized active session by the action ID: GET /session-action/{action_id}.
     */
    public function find(string $actionId): ?SessionActionList
    {
        return $this->fetchOrNull(new GetSessionActionRequest($actionId));
    }
}
