<?php

namespace spkm\ClearPass\Requests\Logs\EndpointInfo;

use spkm\ClearPass\Data\Logs\EndpointInfo;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Look up endpoints by IP address range: GET /insight/endpoint/ip-range/{ip_range}.
 */
class GetEndpointInfoByIpRangeRequest extends ItemRequest
{
    protected ?string $dto = EndpointInfo::class;

    public function __construct(protected string $ipRange) {}

    public function resolveEndpoint(): string
    {
        return '/insight/endpoint/ip-range/'.rawurlencode((string) $this->ipRange);
    }
}
