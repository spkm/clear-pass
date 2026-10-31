<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\PolicerProfile;

use spkm\ClearPass\Data\EnforcementProfile\PolicerProfile;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * GET a list of Policer Profiles: GET /enforcement-profile-dur/policer-profile/{product_name}.
 */
class GetPolicerProfilesRequest extends ListRequest
{
    protected ?string $dto = PolicerProfile::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $productName, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/policer-profile/'.rawurlencode((string) $this->productName);
    }
}
