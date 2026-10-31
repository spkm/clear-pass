<?php

namespace spkm\ClearPass\Requests\PolicyElements\RADIUSProxyTarget;

use spkm\ClearPass\Data\PolicyElements\RADIUSProxyTarget;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of proxy targets: GET /proxy-target.
 */
class GetRADIUSProxyTargetsRequest extends ListRequest
{
    protected ?string $dto = RADIUSProxyTarget::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/proxy-target';
    }
}
