<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\MACAccessControlList;

use spkm\ClearPass\Data\EnforcementProfile\MACAccessControlList;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * GET a list of MAC Access Control Lists: GET /enforcement-profile-dur/mac-access-control-list/{product_name}.
 */
class GetMACAccessControlListsRequest extends ListRequest
{
    protected ?string $dto = MACAccessControlList::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $productName, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/mac-access-control-list/'.rawurlencode((string) $this->productName);
    }
}
