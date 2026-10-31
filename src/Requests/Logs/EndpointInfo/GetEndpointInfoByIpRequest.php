<?php

namespace spkm\ClearPass\Requests\Logs\EndpointInfo;

use spkm\ClearPass\Data\Logs\EndpointInfo;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Look up endpoints by IP address: GET /insight/endpoint/ip/{ip}.
 */
class GetEndpointInfoByIpRequest extends ItemRequest
{
    protected ?string $dto = EndpointInfo::class;

    public function __construct(protected string $ip) {}

    public function resolveEndpoint(): string
    {
        return '/insight/endpoint/ip/'.rawurlencode((string) $this->ip);
    }
}
