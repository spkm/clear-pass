<?php

namespace spkm\ClearPass\Data\GuestConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A DigitalPassTemplate record.
 */
readonly class DigitalPassTemplate extends Data
{
    /**
     * @param  array<int, string>|null  $pass_apps
     * @param  array<int, string>|null  $pass_fields
     * @param  array<int, string>|null  $pass_locations
     */
    public function __construct(
        public ?bool $associated_apps = null,
        public ?string $background_color = null,
        public ?int $background_image = null,
        public ?string $description = null,
        public ?int $footer_image = null,
        public ?string $foreground_color = null,
        public ?string $icon_image = null,
        public ?int $id = null,
        public ?string $label_color = null,
        public ?string $logo_image = null,
        public ?string $logo_text_template = null,
        public ?string $name = null,
        public ?array $pass_apps = null,
        public ?array $pass_fields = null,
        public ?array $pass_locations = null,
        public ?string $pass_style = null,
        public ?bool $relevant_date = null,
        public ?string $relevant_date_mode = null,
        public ?int $relevant_date_rank = null,
        public ?string $relevant_date_template = null,
        public ?bool $relevant_locations = null,
        public ?string $reset = null,
        public ?int $strip_image = null,
        public ?string $strip_shine = null,
        public ?string $summary_template = null,
        public ?int $thumbnail_image = null,
        public ?string $transit_type = null,
    ) {}
}
