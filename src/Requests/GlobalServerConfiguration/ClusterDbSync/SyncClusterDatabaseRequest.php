<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\ClusterDbSync;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\ClusterDbSyncResponse;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Synchronize subscriber with the publisher: POST /cluster/db-sync.
 */
class SyncClusterDatabaseRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = ClusterDbSyncResponse::class;

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
        return '/cluster/db-sync';
    }
}
