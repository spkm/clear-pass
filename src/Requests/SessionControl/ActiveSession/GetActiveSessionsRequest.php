<?php

namespace spkm\ClearPass\Requests\SessionControl\ActiveSession;

use spkm\ClearPass\Data\SessionControl\ActiveSession;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of active sessions: GET /session.
 */
class GetActiveSessionsRequest extends ListRequest
{
    protected ?string $dto = ActiveSession::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/session';
    }
}
