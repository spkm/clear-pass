<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\SessionAccessControlList;

use spkm\ClearPass\Data\EnforcementProfile\SessionAccessControlList;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * GET a list of Session Access Control Lists: GET /enforcement-profile-dur/session-access-control-list/{product_name}.
 */
class GetSessionAccessControlListsRequest extends ListRequest
{
    protected ?string $dto = SessionAccessControlList::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $productName, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/session-access-control-list/'.rawurlencode((string) $this->productName);
    }
}
