<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\FileBackupServer;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\FileBackupServer;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a file backup server by host_address: PUT /file-backup-server/host-address/{host_address}.
 */
class ReplaceFileBackupServerByHostAddressRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = FileBackupServer::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $hostAddress, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/file-backup-server/host-address/'.rawurlencode((string) $this->hostAddress);
    }
}
