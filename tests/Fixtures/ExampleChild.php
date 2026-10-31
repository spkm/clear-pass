<?php

namespace spkm\ClearPass\Tests\Fixtures;

use spkm\ClearPass\Data\Data;

readonly class ExampleChild extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $label = null,
    ) {}
}
