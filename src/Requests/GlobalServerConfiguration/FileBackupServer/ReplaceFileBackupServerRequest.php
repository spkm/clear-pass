<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\FileBackupServer;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\FileBackupServer;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a file backup server: PUT /file-backup-server/{file_backup_server_id}.
 */
class ReplaceFileBackupServerRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = FileBackupServer::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $fileBackupServerId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/file-backup-server/'.$this->fileBackupServerId;
    }
}
