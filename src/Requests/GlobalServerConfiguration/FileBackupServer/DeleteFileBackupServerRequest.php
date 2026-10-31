<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\FileBackupServer;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a file backup server: DELETE /file-backup-server/{file_backup_server_id}.
 */
class DeleteFileBackupServerRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $fileBackupServerId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/file-backup-server/'.$this->fileBackupServerId;
    }
}
