<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\AdminPrivilege;

use spkm\ClearPass\Data\GlobalServerConfiguration\AdminPrivilege;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of admin privileges: GET /admin-privilege.
 */
class GetAdminPrivilegesRequest extends ListRequest
{
    protected ?string $dto = AdminPrivilege::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/admin-privilege';
    }
}
