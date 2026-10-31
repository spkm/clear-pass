<?php

namespace spkm\ClearPass\Data\GlobalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A AdminPrivilege record.
 */
readonly class AdminPrivilege extends Data
{
    /**
     * @param  array<string, mixed>|null  $cppm_privileges
     * @param  array<string, mixed>|null  $insight_privileges
     */
    public function __construct(
        /** Numeric ID of the admin privilege. */
        public ?int $id = null,
        /** Name of the admin privilege. */
        public ?string $name = null,
        /** Property to decide the access type of the user. One of: UI, API, FULL. */
        public ?string $access_type = null,
        /** Privilege list in JSON object format(e.g., {"con:RWD", "mon":"RW"}). */
        public ?array $cppm_privileges = null,
        /** Privilege list in JSON object format(e.g., {"report": "RWD", "dashboard":"RW"}). */
        public ?array $insight_privileges = null,
        /** If selected, all passwords may be displayed in the response. */
        public ?bool $allow_passwords = null,
        /** If selected, Admin user will have access for security configuration. */
        public ?bool $allow_security_configs = null,
        /** Description of the admin privilege. */
        public ?string $description = null,
    ) {}
}
