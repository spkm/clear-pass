<?php

namespace spkm\ClearPass\Data\LocalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A ServerConfiguration record.
 */
readonly class ServerConfiguration extends Data
{
    public function __construct(
        /** Display name of server. */
        public ?string $name = null,
        /** True if this server is processing this API request. */
        public ?bool $local_server = null,
        /** Unique identifier for server. */
        public ?string $server_uuid = null,
        /** Hostname of server. */
        public ?string $server_dns_name = null,
        /** Fully-qualified domain name of server. */
        public ?string $fqdn = null,
        /** IPv4 address of the server’s data port; may be null if not configured. */
        public ?string $server_ip = null,
        /** IPv4 address of the server’s management port; may be null if not configured. */
        public ?string $management_ip = null,
        /** IPv6 address of the server’s data port; may be null if not configured. */
        public ?string $ipv6_server_ip = null,
        /** IPv6 address of the server’s management port; may be null if not configured. */
        public ?string $ipv6_management_ip = null,
        /** True if this server is the publisher within the cluster. */
        public ?bool $is_publisher = null,
        /** True if this server has Insight reporting enabled. */
        public ?bool $is_insight_enabled = null,
        /** True if this server is the Insight primary server. */
        public ?bool $is_insight_primary = null,
        /** Indicates the replication status of this server within the cluster. */
        public ?string $replication_status = null,
        /** Last timestamp for replicated data; null if replication has never occurred. */
        public ?string $last_replication_timestamp = null,
        /** True if this server is the Insight primary server. */
        public ?bool $is_profiler_enabled = null,
    ) {}
}
