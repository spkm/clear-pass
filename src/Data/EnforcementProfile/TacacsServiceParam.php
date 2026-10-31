<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use spkm\ClearPass\Data\Data;

/**
 * A TacacsServiceParam record.
 */
readonly class TacacsServiceParam extends Data
{
    /**
     * @param  array<int, string>|null  $services
     */
    public function __construct(
        /** Authorize Attribute Status. One of: ADD, REPLACE, FAIL. */
        public ?string $authorize_attribute_status = null,
        /** Privilege Level. */
        public ?int $privilege_level = null,
        /** Selected Services. */
        public ?array $services = null,
        /** Commands. */
        public ?TacacsCommandConfig $tacacs_command_config = null,
    ) {}
}
