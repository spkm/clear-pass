<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\NetDestination;

use spkm\ClearPass\Data\EnforcementProfile\NetDestination;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * GET a list of Net Destinations: GET /enforcement-profile-dur/net-destination/{product_name}.
 */
class GetNetDestinationsRequest extends ListRequest
{
    protected ?string $dto = NetDestination::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $productName, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/net-destination/'.rawurlencode((string) $this->productName);
    }
}
