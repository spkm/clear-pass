<?php

namespace spkm\ClearPass\Tests\Fixtures;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\ClearPass\Data\Data;

readonly class ExampleData extends Data
{
    protected const LISTS = ['children' => ExampleChild::class];

    protected const ALIASES = ['disable_tls_1_0' => 'DisableTLS1.0'];

    /**
     * @param  Collection<int, ExampleChild>|null  $children
     * @param  array<string>|null  $tags
     */
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?bool $enabled = null,
        public ?float $ratio = null,
        public ?CarbonImmutable $created_at = null,
        public ?array $tags = null,
        public ?ExampleChild $parent = null,
        public ?Collection $children = null,
        public ?bool $disable_tls_1_0 = null,
    ) {}
}
