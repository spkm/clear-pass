<?php

namespace spkm\ClearPass\Requests\LocalServerConfiguration\AccessControl;

use spkm\ClearPass\Data\LocalServerConfiguration\AccessControl;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get all application access controls: GET /server/access-control/{server_uuid}.
 */
class GetAccessControlsRequest extends ListRequest
{
    protected ?string $dto = AccessControl::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $serverUuid, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/server/access-control/'.rawurlencode((string) $this->serverUuid);
    }
}
