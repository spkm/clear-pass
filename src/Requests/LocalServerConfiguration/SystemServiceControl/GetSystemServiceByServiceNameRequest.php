<?php

namespace spkm\ClearPass\Requests\LocalServerConfiguration\SystemServiceControl;

use spkm\ClearPass\Data\LocalServerConfiguration\SystemServiceControl;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a service by name: GET /server/service/{server_uuid}/{service_name}.
 */
class GetSystemServiceByServiceNameRequest extends ItemRequest
{
    protected ?string $dto = SystemServiceControl::class;

    public function __construct(protected string $serverUuid, protected string $serviceName) {}

    public function resolveEndpoint(): string
    {
        return '/server/service/'.rawurlencode((string) $this->serverUuid).'/'.rawurlencode((string) $this->serviceName);
    }
}
