<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\OnGuardActivity;

use spkm\ClearPass\Data\EndpointVisibility\OnGuardActivity;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of Clearpass OnGuard Endpoints: GET /onguard-activity.
 */
class GetOnGuardActivitiesRequest extends ListRequest
{
    protected ?string $dto = OnGuardActivity::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/onguard-activity';
    }
}
