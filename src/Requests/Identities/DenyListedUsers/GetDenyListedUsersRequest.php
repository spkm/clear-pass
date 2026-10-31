<?php

namespace spkm\ClearPass\Requests\Identities\DenyListedUsers;

use spkm\ClearPass\Data\Identities\DenyListedUsers;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of deny listed users: GET /deny-listed-users.
 */
class GetDenyListedUsersRequest extends ListRequest
{
    protected ?string $dto = DenyListedUsers::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/deny-listed-users';
    }
}
