<?php

namespace spkm\ClearPass\Tests\Fixtures;

use spkm\ClearPass\Requests\ItemRequest;

class ExampleByNameRequest extends ItemRequest
{
    protected ?string $dto = ExampleData::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/example/name/'.rawurlencode($this->name);
    }
}
