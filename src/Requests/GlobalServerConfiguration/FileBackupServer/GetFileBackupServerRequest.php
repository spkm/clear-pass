<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\FileBackupServer;

use spkm\ClearPass\Data\GlobalServerConfiguration\FileBackupServer;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a file backup server: GET /file-backup-server/{file_backup_server_id}.
 */
class GetFileBackupServerRequest extends ItemRequest
{
    protected ?string $dto = FileBackupServer::class;

    public function __construct(protected int $fileBackupServerId) {}

    public function resolveEndpoint(): string
    {
        return '/file-backup-server/'.$this->fileBackupServerId;
    }
}
