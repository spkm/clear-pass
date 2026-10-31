<?php

namespace spkm\ClearPass\Tests\Fixtures;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * A resource ClearPass only lists: no item, create, update or delete.
 *
 * @extends Builder<ExampleData>
 */
class ExampleReadOnlyResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, ExampleData::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new ExampleListRequest($query);
    }
}
