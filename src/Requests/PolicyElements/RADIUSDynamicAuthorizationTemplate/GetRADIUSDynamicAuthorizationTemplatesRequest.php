<?php

namespace spkm\ClearPass\Requests\PolicyElements\RADIUSDynamicAuthorizationTemplate;

use spkm\ClearPass\Data\PolicyElements\RADIUSDynamicAuthorizationTemplate;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of RADIUS Dynamic Authorization Templates: GET /radius-dynamic-authorization-template.
 */
class GetRADIUSDynamicAuthorizationTemplatesRequest extends ListRequest
{
    protected ?string $dto = RADIUSDynamicAuthorizationTemplate::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/radius-dynamic-authorization-template';
    }
}
