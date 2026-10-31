<?php

namespace spkm\ClearPass\Requests\PolicyElements\RADIUSDictionary;

use spkm\ClearPass\Data\PolicyElements\RADIUSDictionary;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of RADIUS Dictionaries: GET /radius-dictionary.
 */
class GetRADIUSDictionariesRequest extends ListRequest
{
    protected ?string $dto = RADIUSDictionary::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/radius-dictionary';
    }
}
