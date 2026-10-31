<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\OnGuardCustomScript;

use spkm\ClearPass\Data\EndpointVisibility\OnGuardCustomScript;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of OnGuard Custom Scripts: GET /onguard-custom-script.
 */
class GetOnGuardCustomScriptsRequest extends ListRequest
{
    protected ?string $dto = OnGuardCustomScript::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/onguard-custom-script';
    }
}
