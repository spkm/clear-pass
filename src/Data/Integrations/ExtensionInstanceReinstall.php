<?php

namespace spkm\ClearPass\Data\Integrations;

use spkm\ClearPass\Data\Data;

/**
 * A ExtensionInstanceReinstall record.
 */
readonly class ExtensionInstanceReinstall extends Data
{
    /**
     * @param  array<string, mixed>|null  $files
     */
    public function __construct(
        /** Maps extension file IDs to local content items, with ‘public:’ or ‘private:’ prefix. */
        public ?array $files = null,
        /** IP address to allocate to the extension, or null. */
        public ?string $ip_address = null,
        /** Desired state of the extension. One of: stopped, running. */
        public ?string $state = null,
    ) {}
}
