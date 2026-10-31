<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\NetworkScan;

use spkm\ClearPass\Data\EndpointVisibility\NetworkScan;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of NetworkScan: GET /config/network-scan.
 */
class GetNetworkScansRequest extends ListRequest
{
    protected ?string $dto = NetworkScan::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/config/network-scan';
    }
}
