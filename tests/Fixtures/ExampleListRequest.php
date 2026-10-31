<?php

namespace spkm\ClearPass\Tests\Fixtures;

use spkm\ClearPass\Requests\ListRequest;

class ExampleListRequest extends ListRequest
{
    protected ?string $dto = ExampleData::class;

    public function resolveEndpoint(): string
    {
        return '/example';
    }
}
