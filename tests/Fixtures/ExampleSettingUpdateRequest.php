<?php

namespace spkm\ClearPass\Tests\Fixtures;

use Saloon\Enums\Method;
use spkm\ClearPass\Requests\WriteRequest;

class ExampleSettingUpdateRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = ExampleData::class;

    public function resolveEndpoint(): string
    {
        return '/example-setting';
    }
}
