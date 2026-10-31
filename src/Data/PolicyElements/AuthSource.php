<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A AuthSource record.
 */
readonly class AuthSource extends Data
{
    /**
     * @param  array<int, string>|null  $authorization_source_names
     */
    public function __construct(
        /** Numeric ID of auth source. */
        public ?int $id = null,
        /** Name of the auth source. */
        public ?string $name = null,
        /** Type of the auth source. One of: AD, Ldap, Sql, HTTP, Kerberos, Local, SHL, TokenServer. */
        public ?string $type = null,
        /** Enable to use this Authentication Source. */
        public ?bool $use_for_authorization = null,
        /** additional auth-sources from which role-mapping attributes to be fetched. */
        public ?array $authorization_source_names = null,
        /** details of Authentication source. */
        public ?AuthSourceConnectionDetailsMetadata $cppm_primary_auth_source_connection_details = null,
        /** details of authentication source backups. */
        public ?AuthSourceBackupConnectionDetailsMetadata $cppm_auth_source_connection_backups = null,
        /** details of authSourceRadiusAttributes. */
        public ?AuthSourceRadiusAttributeDetails $auth_source_radius_attributes = null,
        /** details of auth_source_filters. */
        public ?AuthSourceFiltersDetails $auth_source_filters = null,
        /** Time out if the Authentication source fails to send a response to an authorization query. */
        public ?int $server_timeout = null,
        /** Specify the duration in number of seconds for which the attributes are cached. */
        public ?int $cache_timeout = null,
        /** Description of the auth source. */
        public ?string $description = null,
    ) {}
}
