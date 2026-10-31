<?php

namespace spkm\ClearPass\Tests\Fixtures;

use spkm\ClearPass\Requests\ItemRequest;

class ExampleItemRequest extends ItemRequest
{
    protected ?string $dto = ExampleData::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return "/example/{$this->id}";
    }
}
