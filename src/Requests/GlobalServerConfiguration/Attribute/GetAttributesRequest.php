<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\Attribute;

use spkm\ClearPass\Data\GlobalServerConfiguration\Attribute;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of attributes: GET /attribute.
 */
class GetAttributesRequest extends ListRequest
{
    protected ?string $dto = Attribute::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/attribute';
    }
}
