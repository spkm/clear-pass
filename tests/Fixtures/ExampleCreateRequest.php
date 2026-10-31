<?php

namespace spkm\ClearPass\Tests\Fixtures;

use Saloon\Enums\Method;
use spkm\ClearPass\Requests\WriteRequest;

class ExampleCreateRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = ExampleData::class;

    public function resolveEndpoint(): string
    {
        return '/example';
    }
}
