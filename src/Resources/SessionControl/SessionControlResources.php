<?php

namespace spkm\ClearPass\Resources\SessionControl;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\SessionControl\ActiveSessionAction;
use spkm\ClearPass\Requests\SessionControl\ActiveSessionDisconnect\DisconnectActiveSessionRequest;
use spkm\ClearPass\Resources\BaseResource;

/**
 * The SessionControl API: ClearPass::sessionControl().
 *
 * @extends BaseResource<Data>
 */
class SessionControlResources extends BaseResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Reauthorize an active session.
     */
    public function activeSessionReauthorize(int|string $id): ActiveSessionReauthorizeResource
    {
        return new ActiveSessionReauthorizeResource($this->connector, $id);
    }

    /**
     * Manage active sessions.
     */
    public function activeSessions(): ActiveSessionResource
    {
        return new ActiveSessionResource($this->connector);
    }

    /**
     * Disconnect active session: POST /session/{id}/disconnect.
     *
     * @param  array<string, mixed>|Data  $body
     * @param  array<string, mixed>  $options
     */
    public function disconnectActiveSession(int|string $id, array|Data $body = [], array $options = []): ?ActiveSessionAction
    {
        return $this->fetch(new DisconnectActiveSessionRequest($id, $this->payloadOf($body), $options));
    }

    /**
     * Manage Session Action Methods.
     */
    public function sessionAction(): SessionActionResource
    {
        return new SessionActionResource($this->connector);
    }
}
