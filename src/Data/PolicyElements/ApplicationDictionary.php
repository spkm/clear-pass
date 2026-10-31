<?php

namespace spkm\ClearPass\Data\PolicyElements;

use Illuminate\Support\Collection;
use spkm\ClearPass\Data\Data;

/**
 * A ApplicationDictionary record.
 */
readonly class ApplicationDictionary extends Data
{
    protected const LISTS = ['attributes' => ApplicationDictionaryAttributes::class];

    /**
     * @param  Collection<int, ApplicationDictionaryAttributes>|null  $attributes
     */
    public function __construct(
        /** Numeric id of the Application Dictionary. */
        public ?int $id = null,
        /** Name of the Application Dictionary. */
        public ?string $name = null,
        /** List of Application Dictionary Attributes. A collection of ApplicationDictionaryAttributes. */
        public ?Collection $attributes = null,
        /** Description of the Application Dictionary. */
        public ?string $description = null,
    ) {}
}
