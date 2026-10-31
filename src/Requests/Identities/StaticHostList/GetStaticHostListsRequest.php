<?php

namespace spkm\ClearPass\Requests\Identities\StaticHostList;

use spkm\ClearPass\Data\Identities\StaticHostList;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of static host lists: GET /static-host-list.
 */
class GetStaticHostListsRequest extends ListRequest
{
    protected ?string $dto = StaticHostList::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/static-host-list';
    }
}
