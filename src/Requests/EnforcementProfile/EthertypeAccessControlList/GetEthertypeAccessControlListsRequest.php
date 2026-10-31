<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\EthertypeAccessControlList;

use spkm\ClearPass\Data\EnforcementProfile\EthertypeAccessControlList;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * GET a list of Ethertype Access Control Lists: GET /enforcement-profile-dur/ethertype-access-control-list/{product_name}.
 */
class GetEthertypeAccessControlListsRequest extends ListRequest
{
    protected ?string $dto = EthertypeAccessControlList::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $productName, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/ethertype-access-control-list/'.rawurlencode((string) $this->productName);
    }
}
