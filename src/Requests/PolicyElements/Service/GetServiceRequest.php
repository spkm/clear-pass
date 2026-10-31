<?php

namespace spkm\ClearPass\Requests\PolicyElements\Service;

use spkm\ClearPass\Data\PolicyElements\Service;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Service: GET /config/service/{services_id}.
 */
class GetServiceRequest extends ItemRequest
{
    protected ?string $dto = Service::class;

    public function __construct(protected int $servicesId) {}

    public function resolveEndpoint(): string
    {
        return '/config/service/'.$this->servicesId;
    }
}
