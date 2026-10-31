<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\OperatorProfile;

use spkm\ClearPass\Data\GlobalServerConfiguration\OperatorProfile;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of operator profiles: GET /operator-profile.
 */
class GetOperatorProfilesRequest extends ListRequest
{
    protected ?string $dto = OperatorProfile::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/operator-profile';
    }
}
