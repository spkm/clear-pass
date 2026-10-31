<?php

namespace spkm\ClearPass\Data\Integrations;

use spkm\ClearPass\Data\Data;

/**
 * A ExtensionInstanceUpgrade record.
 */
readonly class ExtensionInstanceUpgrade extends Data
{
    /**
     * @param  array<string, mixed>|null  $files
     */
    public function __construct(
        /** Maps extension file IDs to local content items, with ‘public:’ or ‘private:’ prefix. */
        public ?array $files = null,
        /** IP address to allocate to the extension, or null. */
        public ?string $ip_address = null,
        /** Indicated whether to install major extension upgrades. False by default. */
        public ?bool $major = null,
        /** Desired state of the extension. One of: stopped, running. */
        public ?string $state = null,
    ) {}
}
