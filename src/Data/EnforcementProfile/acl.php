<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use spkm\ClearPass\Data\Data;

/**
 * A acl record.
 */
readonly class acl extends Data
{
    public function __construct(
        /** Name of the ACL. */
        public ?string $name = null,
        /** Type of the ACL. One of: Ethertype, MAC, Stateless, Session. */
        public ?string $type = null,
    ) {}
}
