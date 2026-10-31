<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\FileBackupServer;

use spkm\ClearPass\Data\GlobalServerConfiguration\FileBackupServer;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a file backup server by host_address: GET /file-backup-server/host-address/{host_address}.
 */
class GetFileBackupServerByHostAddressRequest extends ItemRequest
{
    protected ?string $dto = FileBackupServer::class;

    public function __construct(protected string $hostAddress) {}

    public function resolveEndpoint(): string
    {
        return '/file-backup-server/host-address/'.rawurlencode((string) $this->hostAddress);
    }
}
