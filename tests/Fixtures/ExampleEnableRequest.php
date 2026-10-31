<?php

namespace spkm\ClearPass\Tests\Fixtures;

use Saloon\Enums\Method;
use spkm\ClearPass\Requests\ActionRequest;

class ExampleEnableRequest extends ActionRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = ExampleData::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return "/example/{$this->id}/enable";
    }
}
