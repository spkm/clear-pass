<?php

namespace spkm\ClearPass\Data\PolicyElements;

use Illuminate\Support\Collection;
use spkm\ClearPass\Data\Data;

/**
 * A RADIUSDynamicAuthorizationTemplate record.
 */
readonly class RADIUSDynamicAuthorizationTemplate extends Data
{
    protected const LISTS = ['attributes' => RADIUSDynamicAuthorizationTemplateAttributes::class];

    /**
     * @param  Collection<int, RADIUSDynamicAuthorizationTemplateAttributes>|null  $attributes
     */
    public function __construct(
        /** Numeric ID of RADIUS Dynamic Authorization Template. */
        public ?int $id = null,
        /** Name of RADIUS Dynamic Authorization Template. */
        public ?string $name = null,
        /** Vendor Name of RADIUS Dynamic Authorization Template. */
        public ?string $vendor_name = null,
        /** Template Type of RADIUS Dynamic Authorization Template. */
        public ?string $template_type = null,
        /** Display Name of RADIUS Dynamic Authorization Template. */
        public ?string $display_name = null,
        /** Attributes of RADIUS Dynamic Authorization Template. A collection of RADIUSDynamicAuthorizationTemplateAttributes. */
        public ?Collection $attributes = null,
    ) {}
}
