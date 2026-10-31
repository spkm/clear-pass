<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\StatelessAccessControlList;

use spkm\ClearPass\Data\EnforcementProfile\StatelessAccessControlList;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * GET a list of Stateless Access Control Lists: GET /enforcement-profile-dur/stateless-access-control-list/{product_name}.
 */
class GetStatelessAccessControlListsRequest extends ListRequest
{
    protected ?string $dto = StatelessAccessControlList::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $productName, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/stateless-access-control-list/'.rawurlencode((string) $this->productName);
    }
}
