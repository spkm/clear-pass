<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A AuthSourceFiltersDetails record.
 */
readonly class AuthSourceFiltersDetails extends Data
{
    public function __construct(
        /** Details of CppmAuthSourceFilterAttributes. */
        public ?AttributesMetadata $attributes = null,
        /** Details of CppmAuthSourceFilterDetails. */
        public ?DetailsMetadata $details = null,
        /** Name of AuthSourceFilter. */
        public ?string $name = null,
        /** Parameter Values of AuthSourceFilter. */
        public ?string $param_values = null,
        /** Query of AuthSourceFilter. */
        public ?string $query = null,
        /** SelectedDn of AuthSourceFilter. */
        public ?string $selected_Dn = null,
        /** SourceId of AuthSourceFilter. */
        public ?int $source_Id = null,
    ) {}
}
