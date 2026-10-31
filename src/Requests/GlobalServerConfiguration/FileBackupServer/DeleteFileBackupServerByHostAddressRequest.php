<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\FileBackupServer;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a file backup server by host_address: DELETE /file-backup-server/host-address/{host_address}.
 */
class DeleteFileBackupServerByHostAddressRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $hostAddress, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/file-backup-server/host-address/'.rawurlencode((string) $this->hostAddress);
    }
}
