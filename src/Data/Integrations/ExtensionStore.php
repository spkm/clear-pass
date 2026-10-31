<?php

namespace spkm\ClearPass\Data\Integrations;

use spkm\ClearPass\Data\Data;

/**
 * A ExtensionStore record.
 */
readonly class ExtensionStore extends Data
{
    /**
     * @param  array<string, mixed>|null  $files
     */
    public function __construct(
        /** URL for the extension’s documentation. */
        public ?string $about_href = null,
        /** Description of the extension. */
        public ?string $description = null,
        /** Describes each of the file IDs required by this extension. */
        public ?array $files = null,
        /** URL for the extension’s icon. */
        public ?string $icon_href = null,
        /** ID of the extension. */
        public ?string $id = null,
        /** Name of the extension. */
        public ?string $name = null,
        /** Subscribed to this extension. */
        public ?string $subscribed = null,
        /** Version number of the extension. */
        public ?string $version = null,
    ) {}
}
