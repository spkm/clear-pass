<?php

namespace spkm\ClearPass\Requests\LocalServerConfiguration\SystemServiceControl;

use spkm\ClearPass\Data\LocalServerConfiguration\SystemServiceControl;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get all services: GET /server/service/{server_uuid}.
 */
class GetSystemServiceControlsRequest extends ListRequest
{
    protected ?string $dto = SystemServiceControl::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $serverUuid, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/server/service/'.rawurlencode((string) $this->serverUuid);
    }
}
