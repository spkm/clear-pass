<?php

namespace spkm\ClearPass\Requests\LocalServerConfiguration\ServerConfiguration;

use spkm\ClearPass\Data\LocalServerConfiguration\ServerConfiguration;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get configuration of a server: GET /cluster/server/{uuid}.
 */
class GetServerConfigurationRequest extends ItemRequest
{
    protected ?string $dto = ServerConfiguration::class;

    public function __construct(protected string $uuid) {}

    public function resolveEndpoint(): string
    {
        return '/cluster/server/'.rawurlencode((string) $this->uuid);
    }
}
