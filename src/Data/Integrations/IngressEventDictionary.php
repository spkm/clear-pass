<?php

namespace spkm\ClearPass\Data\Integrations;

use Illuminate\Support\Collection;
use spkm\ClearPass\Data\Data;

/**
 * A IngressEventDictionary record.
 */
readonly class IngressEventDictionary extends Data
{
    protected const LISTS = ['fields' => Fields::class, 'generic_fields' => GenericFields::class];

    /**
     * @param  Collection<int, Fields>|null  $fields
     * @param  Collection<int, GenericFields>|null  $generic_fields
     */
    public function __construct(
        /** Numeric ID of the ingress event. */
        public ?int $id = null,
        /** Vendor of the ingress event. */
        public ?string $vendor = null,
        /** Format Name of the ingress event. */
        public ?string $format_name = null,
        /** Prefix of the ingress event. */
        public ?string $prefix = null,
        /** Status of the ingress event. */
        public ?bool $status = null,
        /** Description of the ingress event. */
        public ?string $description = null,
        /** Format of the ingress event. */
        public ?string $format = null,
        /** Sample of the ingress event. */
        public ?string $sample = null,
        /** Filter of the ingress event. */
        public ?string $filter = null,
        /** Fields of the ingress event. A collection of Fields. */
        public ?Collection $fields = null,
        /** Generic Fields of the ingress event. A collection of GenericFields. */
        public ?Collection $generic_fields = null,
    ) {}
}
