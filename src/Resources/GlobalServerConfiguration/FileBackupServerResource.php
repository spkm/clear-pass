<?php

namespace spkm\ClearPass\Resources\GlobalServerConfiguration;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\GlobalServerConfiguration\FileBackupServer;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\FileBackupServer\CreateFileBackupServerRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\FileBackupServer\DeleteFileBackupServerByHostAddressRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\FileBackupServer\DeleteFileBackupServerRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\FileBackupServer\GetFileBackupServerByHostAddressRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\FileBackupServer\GetFileBackupServerRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\FileBackupServer\GetFileBackupServersRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\FileBackupServer\ReplaceFileBackupServerByHostAddressRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\FileBackupServer\ReplaceFileBackupServerRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\FileBackupServer\UpdateFileBackupServerByHostAddressRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\FileBackupServer\UpdateFileBackupServerRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage file backup server, from ClearPass::globalServerConfiguration()->fileBackupServers().
 *
 * @extends Builder<FileBackupServer>
 */
class FileBackupServerResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, FileBackupServer::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetFileBackupServersRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateFileBackupServerRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetFileBackupServerRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateFileBackupServerRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceFileBackupServerRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteFileBackupServerRequest((int) $id, $options);
    }

    /**
     * Get a file backup server by host_address: GET /file-backup-server/host-address/{host_address}.
     */
    public function findByHostAddress(string $hostAddress): ?FileBackupServer
    {
        return $this->fetchOrNull(new GetFileBackupServerByHostAddressRequest($hostAddress));
    }

    /**
     * Update some fields of a file backup server by host_address: PATCH /file-backup-server/host-address/{host_address}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByHostAddress(string $hostAddress, array|Data $attributes = [], array $options = []): ?FileBackupServer
    {
        return $this->fetch(new UpdateFileBackupServerByHostAddressRequest($hostAddress, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a file backup server by host_address: PUT /file-backup-server/host-address/{host_address}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByHostAddress(string $hostAddress, array|Data $attributes = [], array $options = []): ?FileBackupServer
    {
        return $this->fetch(new ReplaceFileBackupServerByHostAddressRequest($hostAddress, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a file backup server by host_address: DELETE /file-backup-server/host-address/{host_address}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByHostAddress(string $hostAddress, array $options = []): bool
    {
        $this->fetch(new DeleteFileBackupServerByHostAddressRequest($hostAddress, $options));

        return true;
    }
}
