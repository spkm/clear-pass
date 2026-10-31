<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\FileBackupServer;

use spkm\ClearPass\Data\GlobalServerConfiguration\FileBackupServer;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of file backup server: GET /file-backup-server.
 */
class GetFileBackupServersRequest extends ListRequest
{
    protected ?string $dto = FileBackupServer::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/file-backup-server';
    }
}
