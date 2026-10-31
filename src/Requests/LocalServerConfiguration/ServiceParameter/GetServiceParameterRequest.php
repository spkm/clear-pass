<?php

namespace spkm\ClearPass\Requests\LocalServerConfiguration\ServiceParameter;

use spkm\ClearPass\Data\LocalServerConfiguration\ServiceParameter;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get service parameter details: GET /service-parameter/{server_uuid}/{service_id}.
 */
class GetServiceParameterRequest extends ItemRequest
{
    protected ?string $dto = ServiceParameter::class;

    public function __construct(protected string $serverUuid, protected int $serviceId) {}

    public function resolveEndpoint(): string
    {
        return '/service-parameter/'.rawurlencode((string) $this->serverUuid).'/'.$this->serviceId;
    }
}
