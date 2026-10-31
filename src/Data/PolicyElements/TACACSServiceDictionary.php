<?php

namespace spkm\ClearPass\Data\PolicyElements;

use Illuminate\Support\Collection;
use spkm\ClearPass\Data\Data;

/**
 * A TACACSServiceDictionary record.
 */
readonly class TACACSServiceDictionary extends Data
{
    protected const LISTS = ['attributes' => TACACSServiceDictionaryAttributes::class];

    /**
     * @param  Collection<int, TACACSServiceDictionaryAttributes>|null  $attributes
     */
    public function __construct(
        /** Numeric ID of TACACS+ Service Dictionary. */
        public ?int $id = null,
        /** Name of TACACS+ Service Dictionary. */
        public ?string $name = null,
        /** Display Name of TACACS+ Service Dictionary. */
        public ?string $display_name = null,
        /** List of TACACS+ Service Dictionary Attributes. A collection of TACACSServiceDictionaryAttributes. */
        public ?Collection $attributes = null,
    ) {}
}
