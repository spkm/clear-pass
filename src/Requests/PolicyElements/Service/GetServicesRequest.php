<?php

namespace spkm\ClearPass\Requests\PolicyElements\Service;

use spkm\ClearPass\Data\PolicyElements\Service;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of Services: GET /config/service.
 */
class GetServicesRequest extends ListRequest
{
    protected ?string $dto = Service::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/config/service';
    }
}
