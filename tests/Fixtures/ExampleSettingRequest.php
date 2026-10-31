<?php

namespace spkm\ClearPass\Tests\Fixtures;

use spkm\ClearPass\Requests\ItemRequest;

class ExampleSettingRequest extends ItemRequest
{
    protected ?string $dto = ExampleData::class;

    public function resolveEndpoint(): string
    {
        return '/example-setting';
    }
}
