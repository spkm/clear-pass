<?php

namespace spkm\ClearPass\Data\Logs;

use spkm\ClearPass\Data\Data;

/**
 * A LoginAudit record.
 */
readonly class LoginAudit extends Data
{
    /**
     * @param  array<string, mixed>|null  $last_successful_login
     * @param  array<string, mixed>|null  $last_failure_login
     */
    public function __construct(
        /** Timestamp at which the query is executed. */
        public ?string $timestamp = null,
        /** User name. */
        public ?string $username = null,
        /** Contains details of previous successful login. */
        public ?array $last_successful_login = null,
        /** Contains all failure attempts in-between previous successful login and now. */
        public ?array $last_failure_login = null,
    ) {}
}
