<?php

namespace spkm\ClearPass\Requests\Identities\LocalUser;

use spkm\ClearPass\Data\Identities\LocalUser;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of local users: GET /local-user.
 */
class GetLocalUsersRequest extends ListRequest
{
    protected ?string $dto = LocalUser::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/local-user';
    }
}
