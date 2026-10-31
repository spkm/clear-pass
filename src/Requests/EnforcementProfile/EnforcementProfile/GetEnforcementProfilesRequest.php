<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\EnforcementProfile;

use spkm\ClearPass\Data\EnforcementProfile\EnforcementProfile;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of Enforcement Profiles: GET /enforcement-profile.
 */
class GetEnforcementProfilesRequest extends ListRequest
{
    protected ?string $dto = EnforcementProfile::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile';
    }
}
