<?php

namespace spkm\ClearPass\Requests\Identities\GuestUser;

use spkm\ClearPass\Data\Identities\GuestUser;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of guest accounts: GET /guest.
 */
class GetGuestUsersRequest extends ListRequest
{
    protected ?string $dto = GuestUser::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/guest';
    }
}
