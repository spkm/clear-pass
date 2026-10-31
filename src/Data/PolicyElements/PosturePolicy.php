<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A PosturePolicy record.
 */
readonly class PosturePolicy extends Data
{
    /**
     * @param  array<int, string>|null  $roles
     */
    public function __construct(
        /** Numeric ID of Posture Policy. */
        public ?int $id = null,
        /** Posture Policy Name. */
        public ?string $name = null,
        /** Posture Agent. One of: Supplicant, WebAgent. */
        public ?string $posture_agent = null,
        /** Host Operating System. One of: Windows, Linux, macOS. */
        public ?string $host_os = null,
        /** Plugin Version. */
        public ?string $plugin_version = null,
        /** Posture Policy XML. */
        public ?string $policy_xml = null,
        /** Description. */
        public ?string $description = null,
        /** Restrict by Roles. */
        public ?array $roles = null,
    ) {}
}
