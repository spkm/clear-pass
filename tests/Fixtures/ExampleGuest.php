<?php

namespace spkm\ClearPass\Tests\Fixtures;

use Carbon\CarbonImmutable;
use spkm\ClearPass\Data\Data;

/**
 * A model as ClearPass Guest keeps them: dates as Unix timestamps and custom fields beyond the documented ones.
 */
readonly class ExampleGuest extends Data
{
    protected const EXTRA = true;

    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $id = null,
        public ?string $username = null,
        public ?CarbonImmutable $expire_time = null,
        public array $extra = [],
    ) {}
}
