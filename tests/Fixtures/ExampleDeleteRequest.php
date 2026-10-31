<?php

namespace spkm\ClearPass\Tests\Fixtures;

use spkm\ClearPass\Requests\DeleteRequest;

class ExampleDeleteRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return "/example/{$this->id}";
    }
}
