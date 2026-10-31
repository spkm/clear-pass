<?php

namespace spkm\ClearPass\Requests\CertificateAuthority\OnboardUser;

use spkm\ClearPass\Data\CertificateAuthority\OnboardUser;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of users: GET /user.
 */
class GetOnboardUsersRequest extends ListRequest
{
    protected ?string $dto = OnboardUser::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/user';
    }
}
