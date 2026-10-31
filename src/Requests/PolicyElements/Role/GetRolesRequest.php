<?php

namespace spkm\ClearPass\Requests\PolicyElements\Role;

use spkm\ClearPass\Data\PolicyElements\Role;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of roles: GET /role.
 */
class GetRolesRequest extends ListRequest
{
    protected ?string $dto = Role::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/role';
    }
}
