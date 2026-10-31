<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\FileBackupServer;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\FileBackupServer;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new file backup server: POST /file-backup-server.
 */
class CreateFileBackupServerRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = FileBackupServer::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/file-backup-server';
    }
}
