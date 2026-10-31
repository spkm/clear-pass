<?php

namespace spkm\ClearPass\Requests\Logs\EndpointInfo;

use spkm\ClearPass\Data\Logs\EndpointInfo;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a single endpoint by MAC address: GET /insight/endpoint/mac/{mac}.
 */
class GetEndpointInfoByMacRequest extends ItemRequest
{
    protected ?string $dto = EndpointInfo::class;

    public function __construct(protected string $mac) {}

    public function resolveEndpoint(): string
    {
        return '/insight/endpoint/mac/'.rawurlencode((string) $this->mac);
    }
}
