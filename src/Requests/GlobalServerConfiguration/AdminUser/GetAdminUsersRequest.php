<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\AdminUser;

use spkm\ClearPass\Data\GlobalServerConfiguration\AdminUser;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of admin users: GET /admin-user.
 */
class GetAdminUsersRequest extends ListRequest
{
    protected ?string $dto = AdminUser::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/admin-user';
    }
}
