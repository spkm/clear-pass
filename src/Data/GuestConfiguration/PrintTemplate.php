<?php

namespace spkm\ClearPass\Data\GuestConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A PrintTemplate record.
 */
readonly class PrintTemplate extends Data
{
    public function __construct(
        /** Columns in a template. */
        public ?int $columns = null,
        /** Flag indicating if the template is enabled. */
        public ?bool $enabled = null,
        /** HTML template code used at the end of the document. */
        public ?string $footer = null,
        /** HTML template code used at the beginning of the document. */
        public ?string $header = null,
        /** Numeric ID of the template. */
        public ?int $id = null,
        /** Name of the template. */
        public ?string $name = null,
        /** HTML template code used to generate a single account receipt. */
        public ?string $per_account = null,
        /** Field header for the details displayed on the template. */
        public ?string $wizard_field_header = null,
        /** Visitor account fields. */
        public ?string $wizard_fields = null,
        /** Footer text to display on the template. */
        public ?string $wizard_footer = null,
        /** Image to use on the template. */
        public ?string $wizard_logo = null,
        /** Notes to display on the template. */
        public ?string $wizard_notes = null,
        /** Subtitle to display on the template. */
        public ?string $wizard_subtitle = null,
        /** Style of print template to use. */
        public ?string $wizard_template = null,
        /** Title which will be displayed on the template. */
        public ?string $wizard_title = null,
    ) {}
}
