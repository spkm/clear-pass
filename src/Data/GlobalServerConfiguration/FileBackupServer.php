<?php

namespace spkm\ClearPass\Data\GlobalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A FileBackupServer record.
 */
readonly class FileBackupServer extends Data
{
    /**
     * @param  array<int, string>|null  $cppm_servers
     */
    public function __construct(
        /** Numeric id of file backup server. */
        public ?int $id = null,
        /** Server host address of file backup server. */
        public ?string $host_address = null,
        /** Protocol for file backup server. One of: SFTP, SCP, NFS 3, NFS 4. */
        public ?string $protocol = null,
        /** Port for file backup server. */
        public ?int $port = null,
        /** Username of file backup server. */
        public ?string $username = null,
        /** Timeout for file backup server. */
        public ?int $time_out = null,
        /** Remote directory for file backup server. */
        public ?string $remote_dir = null,
        /** ClearPass server UUID List for file backup server. */
        public ?array $cppm_servers = null,
        /** Description of file backup server. */
        public ?string $description = null,
        /** Password for file backup server. */
        public ?string $password = null,
    ) {}
}
