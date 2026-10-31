<?php

namespace spkm\ClearPass\Resources\SessionControl;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\SessionControl\ActiveSession;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ListRequest;
use spkm\ClearPass\Requests\SessionControl\ActiveSession\GetActiveSessionRequest;
use spkm\ClearPass\Requests\SessionControl\ActiveSession\GetActiveSessionsRequest;

/**
 * Manage active sessions, from ClearPass::sessionControl()->activeSessions().
 *
 * @extends Builder<ActiveSession>
 */
class ActiveSessionResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, ActiveSession::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetActiveSessionsRequest($query);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetActiveSessionRequest($id);
    }
}
