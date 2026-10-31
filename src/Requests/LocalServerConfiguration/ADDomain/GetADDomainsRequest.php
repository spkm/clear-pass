<?php

namespace spkm\ClearPass\Requests\LocalServerConfiguration\ADDomain;

use spkm\ClearPass\Data\LocalServerConfiguration\ADDomain;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of AD Domains: GET /ad-domain/{server_uuid}.
 */
class GetADDomainsRequest extends ListRequest
{
    protected ?string $dto = ADDomain::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $serverUuid, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/ad-domain/'.rawurlencode((string) $this->serverUuid);
    }
}
