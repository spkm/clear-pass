<?php

namespace spkm\ClearPass\Requests\PolicyElements\RoleMapping;

use spkm\ClearPass\Data\PolicyElements\RoleMapping;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of role mappings: GET /role-mapping.
 */
class GetRoleMappingsRequest extends ListRequest
{
    protected ?string $dto = RoleMapping::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/role-mapping';
    }
}
