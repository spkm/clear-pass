<?php

namespace spkm\ClearPass\Requests\PolicyElements\PosturePolicy;

use spkm\ClearPass\Data\PolicyElements\PosturePolicy;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of Posture Policies: GET /posture-policy.
 */
class GetPosturePoliciesRequest extends ListRequest
{
    protected ?string $dto = PosturePolicy::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/posture-policy';
    }
}
