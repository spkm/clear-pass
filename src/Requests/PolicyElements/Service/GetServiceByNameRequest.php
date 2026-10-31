<?php

namespace spkm\ClearPass\Requests\PolicyElements\Service;

use spkm\ClearPass\Data\PolicyElements\Service;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Service by name: GET /config/service/name/{services_name}.
 */
class GetServiceByNameRequest extends ItemRequest
{
    protected ?string $dto = Service::class;

    public function __construct(protected string $servicesName) {}

    public function resolveEndpoint(): string
    {
        return '/config/service/name/'.rawurlencode((string) $this->servicesName);
    }
}
