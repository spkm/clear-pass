<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\NetService;

use spkm\ClearPass\Data\EnforcementProfile\NetService;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * GET a list of Net Services: GET /enforcement-profile-dur/net-service/{product_name}.
 */
class GetNetServicesRequest extends ListRequest
{
    protected ?string $dto = NetService::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $productName, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/net-service/'.rawurlencode((string) $this->productName);
    }
}
